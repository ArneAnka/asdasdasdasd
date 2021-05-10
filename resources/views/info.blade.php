<x-guest-layout>
    <div class="container mx-auto my-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="md:text-center">
                <span class="text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    aktier.co
                </span>
                <span class="hidden md:inline-block md:border-l md:pl-5 ml-5">Aggregerad handelsinformation</span>
                <span class="float-right">
                    @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                    @endauth
                    @endif
                </span>
            </div>
        </div>
    </div>

    <div class="container mx-auto border-t">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 lg:text-center">
            <p class="mt-10 mb-5 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Hur fungerar aktier.co?
            </p>
        </div>

        <!-- nyheter -->
        <div class="flex flex-col p-1 md:p-8 lg:p-8 space-y-4 bg-white p-4 rounded shadow">
            <h2 class="text-2xl underline"><a name="nyheter">Nyheter</a></h2>
            <p class="mb-2">Nyhetesrubriker hämtas med ett jämt intervall från massor av olika väletablerade medier - helt automatiserat.</p>
            <p>Är det okej? Ja det är helt okej att länka till andra hemsidor. Bland annat går <i>Johanna Nielsen</i> igenom juridiken i ett blogg-inlägg som du kan hitta <a class="underline text-indigo-500" href="https://virtuellabolagsjuristen.virmeda.se/lagligt-att-lanka/" alt="Den virtuella bloggjuristen">här</a>. Vår ambition är inte att publicera nyheter i sin helhet, utan skapa en platform för att överblicka nyhetsläget på ett enkelt sätt och låta våra användare själv klicka sig vidare om de finner en intressant nyhet.</p>

            <!-- länkar -->
            <h2 class="text-2xl underline"><a name="links">Länkar</a></h2>
            <p class="mb-2">Användare kan själv länka till olika hemsidor. Beakta dock vår ToS, så att du inte bryter mot dem. Det går inte heller att länka till något som redan är länkat till.</p>

            <!-- Post -->
            <h2 class="text-2xl underline"><a name="posts">Poster</a></h2>
            <p class="mb-2">Användare kan själv skriva inlägg på aktier.co. De kan innehåller egentligen obegränsat antal tecken. Det går också att använda sig av <u>markdown</u> för att formatera sin text. Googla på exempelvis "Github Flavored Markdown cheatsheet" så hittar du enkelt en, eller flera, lathundar.</p>
            <p class="mt-5">Några funktioner är:</p>
            <ul class="list-disc list-inside">
                <li>En lista</li>
                <li>Gör text kursiverad text</li>
                <li>Gör text fet</li>
                <li>Lägg till rubrik</li>
                <li>Infoga bild - eller bilder</li>
            </ul>

            <!-- kommentarer -->
            <h2 class="text-2xl underline"><a name="posts">Kommentarer</a></h2>
            <p class="mb-2">Vå ambition är att skapa en social platform, och låta vem som helst delta i intressanta diskussioner. Aktier.co erbjuder deltagande i stort sett på alla våra olika funktioner på platformen.</p>

        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <p class="mt-10 mb-5 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Kärnconcept
                </p>
            </div>
        </div>


        <!-- nyheter -->
        <div class="flex flex-col p-1 md:p-8 lg:p-8 space-y-4 bg-white p-4 rounded shadow">
            <h2 class="text-2xl underline"><a name="nyheter">Användaravtal</a></h2>
            <p class="mb-2">I dagsläget är aktier.co helt och hållet modererat efter eget tycke. Moderatorer kan utan varsel radera inlägg, kommentarer och länkar. Moderatorer kan utan varsel också radera användare och hindra dem från att registrera nytt, eller nya konton.</p>
            <p class="mt-5">Svensk lagstiftning är utgångspunkten.</p>
            <p class="mt-5">1 §&nbsp;Allt pornografiskt innehåll är förbjudet.</p>
            <p class="mt-5">2 §&nbsp;Inget riktat hat mot någon grupp av människor.</p>
            <p class="mt-5">3 §&nbsp;Inget riktat hot mot någon grupp av människor.</p>
            <p class="mt-5">4 §&nbsp;All form av piratkopiering förbjuden, även länkning till sådant innehåll.</p>
            <p class="mt-5">5 §&nbsp;Inget våldsrelaterat.</p>

            <!-- länkar -->
            <h2 class="text-2xl underline"><a name="links">Integritetspolicy</a></h2>
            <p class="mb-2">Aktier.co värnar givetvis om din integritet. Vår ambition är att spara så lite information om dig som möjligt. Det finns dock tekniska anspekter som gör att vi behöver spara viss information om dig på vår server, samt spara cookies på din datormaskin.</p>
            <p class="mt-5 underline">Den information som vi sparar om dig på vår server är:
            <ul class="list-disc list-inside">
                <li>Registeringsuppgifter. De uppgifter som du själv anger, samt det IP-nummer som du använder vid registrering. Observera att lösenord <u>inte sparas i klarttext</u>. För att säkra integriteten använder vi oss av branschstandard kopplat till hantering av lösenord.</li>
                <li>Inloggningstid/er med oidentifierbar data.</li>
                <li>Oidentifierbar data när du kommenterar, postar inlägg eller postar länkar.</li>
            </ul>
            <p class="mt-5">Vi sparar i regel inte några IP-adresser, vi sparar en hashad kombination av ditt IP-nummer samt din "User-agent".</p>
            </p>
            <p class="mt-5 udnerline">Den information som vi sparar på din datormaskin:
            <ul class="list-disc list-inside">
                <li>En (1) cookie, innhållande:
                    <ol class="list-disc list-inside" style="list-style-type: lower-alpha; padding-bottom: 0;">
                        <li style="margin-left:2em">banner_clicked. Används för att veta om du har klickat bort banner som visas längst upp på sidan.</li>
                        <li style="margin-left:2em">aktier.co_session. För att veta om du har loggat in.</li>
                        <li style="margin-left:2em">XSRF-TOKEN. För att öka säkerheten för dig som användare. Det går att läsa mer om XSRF-attacker på <a class="underline text-indigio-500" href="https://en.wikipedia.org/wiki/Cross-site_request_forgery">Wikipedia</a>.</li>
                    </ol>
                </li>
            </ul>
            </p>
            <p class="mt-5">Vi spårar aktivitet på aktier.co genom att att använda oss av tredjepartsverktyg som är GDPR-kompatibla. Den datan sparas inte i USA och datan är inte spårbar. Se <a class="underline text-indigio-500" href="https://plausible.io/privacy">www.plausible.io privacy hantering här</a>.</p>
            <p class="mt-5">Du kan när som helst välja att radera ditt konto. I samband med det raderas också all den information som finns lagrad om dig.</p>

            <h2 class="text-2xl underline"><a name="posts">Värdegrund</a></h2>
            <p class="mb-2">I dagsläget är det sunt förnuft som råder på aktier.co.</p>
        </div>


        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <p class="mt-10 mb-5 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Anpassning
                </p>
            </div>
        </div>

        <!-- nyheter -->
        <div class="flex flex-col p-1 md:p-8 lg:p-8 space-y-4 bg-white p-4 rounded shadow">
            <h2 class="text-2xl underline"><a name="nyheter">Avatar</a></h2>
            <p class="mb-2">Du tilldelas automatiskt en avatar när du registrerar dig på aktier.co, men kan när som helst välja att ladda upp en egen avatar.</p>

            <h2 class="text-2xl underline"><a name="links">Användar- och visningsnamn</a></h2>
            <p class="mb-2">När du registrerar dig så väljer du ett visningsnamn, som du i dagsläget kan ändra hur många gånger du vill. Du väljer samtidigt ett "smeknamn". Detta smeknamn behöver vara unikt i syfte att identifiera användare - se det som ett personnummer - det går inte att ändra smeknamn.</p>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <p class="mt-10 mb-5 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Community
                </p>
            </div>
        </div>

        <!-- nyheter -->
        <div class="flex flex-col p-1 md:p-8 lg:p-8 space-y-4 bg-white p-4 rounded shadow">
            <h2 class="text-2xl underline"><a name="nyheter">Användare</a></h2>
            <p class="mb-2">I dagsläget går det inte att söka på, eller lista alla användare.</p>

            <h2 class="text-2xl underline"><a name="links">Bli verifierad</a></h2>
            <p class="mb-2">Syftet med att bli verifierad användare är först och främst att det kommer att öka din trovärdighet på aktier.co.</p>
            <p class="mt-5">Processen för att bli verifierad användare är in fastställd. Mer analys kopplat till GDPR behövs.</p>
        </div>

    </div> <!-- /container -->

</x-guest-layout>