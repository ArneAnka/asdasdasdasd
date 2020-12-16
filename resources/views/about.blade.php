<x-guest-layout title="Nytt utseende">
  <div class="container mx-auto my-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="lg:text-center">
        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          Nytt utseende och funktionalitet på aktier.co
        </p>
      </div>
    </div>
  </div>

<div class="container mx-auto">
    <div class="flex flex-col bg-gray-200 rounded p-1 md:p-8 lg:p-8 shadow space-y-4">
      <div class="bg-white p-4 rounded shadow">
          <h2 class="text-2xl underline">Aggregerad</h2>
          <p class="mb-2">Synonymer till ordet "aggregerad" är bland annat <i>ihopsamlad</i>, <i>ihopklumpad</i>, <i>sammanräknad</i> osv. Och det är just det som ändamålet med <b>aktier.co</b> är; att samla den viktigaste informationen som du kan tänkas behöva i ditt informationssökande.</p>
          <p class="mb-2">För att lyckas med att samla information använder vi oss främst av öppna, fritt-tillgängliga API:er. som vi kontinuerligt gör slagningar på, för att hålla oss så uppdaterade som möjligt. Många APIer har desutom ingen bortre gräns för hur många slagningar som kan genomföras under en dag, eller timme - vilket resulterar i att du får den absolut senaste informationen!</p>
          <p class="mb-2">På sikt vill vi möjliggöra för användare att bistå med information, exempelvis att lägga till egna artiklar, kommentarer och länkar - likt reddit.</p>
          <h2 class="text-2xl underline">På fram- och baksidan</h2>
          <p class="mb-2">Tidigare drevs aktier.co av <b>Laravel</b>, vilket det fortfarande gör, men den senaste versionen (Laravel 8). Den möjliggör för att göra asynkrona slagningar på ett mycket enkelt sätt! Resultatet av det enkla handhavandet av mjukvaran, gör att vi enkelt och <i>relativt</i> snabbt kan implementera nya funktioner och utveckla redan existerande.</p>
          <p class="mb-2"><b>Aktier.co</b> hade ett gäng hemmasnickrade python-skript som med ett förutbestämt intervall hämtade data från olika källor. Dessa skript har nu samlats under en gemensam, lokal API-tjänst. Den processen har varit omfattande, men resultatet är en bättre användarupplevelse.</p>
          <h2 class="text-2xl underline">tl;dr</h2>
          <p>Mycket nytt på framsidan och givetvis då också under huven!</p>
      </div>
        <div class="bg-white p-4 rounded shadow flex ">
            <a class="hover:text-gray-600 flex items-center" href="{{ route('welcome') }}">
            <span><svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="30" height="30"><path d="M6.854 5.854l.353-.354-.707-.707-.354.353.708.708zM4.5 7.5l-.354-.354-.353.354.353.354L4.5 7.5zm1.646 2.354l.354.353.707-.707-.353-.354-.708.708zM7.5.5V0v.5zm7 7h.5-.5zm-14 0H1 .5zm7 7V14v.5zM6.146 5.146l-2 2 .708.708 2-2-.708-.708zm-2 2.708l2 2 .708-.708-2-2-.708.708zM4.5 8H11V7H4.5v1zm3-7A6.5 6.5 0 0114 7.5h1A7.5 7.5 0 007.5 0v1zM1 7.5A6.5 6.5 0 017.5 1V0A7.5 7.5 0 000 7.5h1zM7.5 14A6.5 6.5 0 011 7.5H0A7.5 7.5 0 007.5 15v-1zm0 1A7.5 7.5 0 0015 7.5h-1A6.5 6.5 0 017.5 14v1z" fill="currentColor"></path></svg></span>
            <span>Ta mig tillbaka</span></a>
        </div>
    </div>
</div>
</x-guest-layout>
