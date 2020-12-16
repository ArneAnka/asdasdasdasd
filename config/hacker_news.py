import requests
from bs4 import BeautifulSoup
import sqlite3
from sqlite3 import Error
import datetime

class Scraper:
    def __init__(self, keywords):
        self.markup = requests.get('https://news.ycombinator.com/').text
        self.keywords = [x.lower() for x in keywords]
        #self.connection = sqlite3.connect('/var/www/html/aktier.co/database/database.db')
        self.datetime = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")

    def parse(self):
        soup = BeautifulSoup(self.markup, 'html.parser')
        links = soup.findAll("a", {'class':'storylink'})
        self.saved_links = []
        for link in links:
            for keyword in self.keywords:
                if keyword in link.text.lower():
                    print(link)
                    self.saved_links.append(link)

    # https://stackoverflow.com/questions/19337029/insert-if-not-exists-statement-in-sqlite
    def store(self):
        cur = self.connection.cursor()
        for link in self.saved_links:
            sql = 'INSERT OR IGNORE INTO news (topic, url, site, created_at, updated_at) VALUES ("{0}", "{1}", "{2}", "{3}", "{4}")'
            try:
                cur.execute(sql.format(link.text, link.get('href'), 'news.ycombinator.com', self.datetime, self.datetime))
            except Error as e:
                print(e)
        self.connection.commit()

if __name__ == '__main__':
    s = Scraper(['Bitcoin', 'blockchain', 'Cryptocurrency', 'Satoshi Nakamoto', 'Zoom', 'Google'])
    s.parse()
    # s.store()
