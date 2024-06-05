@extends('layouts.app')

@section('header')
    <div class="px-6 py-4 flex items-center justify-between gap-4 border-b border-black">
        <div>
            <h1 class="text-3xl mb-2">Help!</h1>

            <p>
                Afvallen lukt niet (meer)
            </p>
        </div>

        <x-icon name="info" size="w-[3.5rem] h-[3.5rem]" />
    </div>
@endsection

@section('content')
    <div class="space-y-4">
        <p>Je bent bezig met afvallen met Slinc maar de weegschaal staat stil. Dat kan weleens gebeuren. Laten we samen even kijken wat er aan de hand is en wat je eraan kunt doen. Neem onderstaande vragen door en krijg direct antwoord.</p>

        <x-faq-list>
            <x-faq-list-item title="Heb je alles gegeten wat er staat voorgeschreven?">
                <p>Het is belangrijk dat je alles eet en niets weglaat. Slinc is een uitgebalanceerd voedingsprogramma waardoor je lichaam optimaal functioneert. Je krijgt op deze manier voldoende vezels, vitaminen en mineralen binnen. De verbranding is hierdoor optimaal. De bloedsuikerspiegel blijft op deze manier het meest stabiel, waardoor je je topfit voelt.</p>
                <p>Door minder te eten, mis je essentiële stoffen en gaat je lichaam minder efficiënt werken. Je stofwisseling is lager, dus ook je vetverbranding. Het resultaat in kg valt daardoor tegen. Eet dus niet minder, laat niets weg.</p>
            </x-faq-list-item>

            <x-faq-list-item title="Heb je om de 2 à 2,5 uur gegeten?">
                <p>Om de 2 à 2,5 uur eten is belangrijk om de stofwisseling optimaal te houden en daarmee een zo hoog mogelijke vetverbranding te creëren. Eet je bijvoorbeeld je tussendoortje 's morgens om 10.00 uur en je luncht pas om 14.00 uur, zorg er dan voor dat je nogmaals iets eet rond 12.00 uur. Eet dan nogmaals een portie fruit met zuivel. Of je kunt ervoor kiezen om alvast wat groente te eten (stuk komkommer en tomaat). Je mag dit als extra moment eten! Dit geldt ook voor de middag. Eet je al om 14.00 uur het fruit en zuivel, maar dineert je pas laat om 19.00 uur, eet dan nogmaals in de middag fruit en zuivel.</p>
                <p>Ga je een nachtdienst in? Blijf dan om de 3 uur eten. Je bent wakker en actief, dus je energieverbruik is hoger dan wanneer je slaapt. Eet dus! Meer <a href="https://rachelhulshof.nl/tips-onregelmatige-diensten/" target="_blank">tips voor nachtdiensten</a>.</p>
            </x-faq-list-item>

            <x-faq-list-item title="Heb je niet gezondigd? Niet calorierijk gegeten, niet gesnoept en geen alcohol gedronken?">
                <p>Het is ook belangrijk om te weten waar in je programma je gezondigd hebt. Ben je pas bezig of ben je al langer aan het Slincen? Maak hieronder je keuze.</p>

                <ul>
                    <li>Ik ben 3 weken of korter bezig met Slinc</li>
                    <li>Ik ben al 4 weken of langer bezig met Slinc</li>
                </ul>
            </x-faq-list-item>

            <x-faq-list-item title="Ik ben 3 weken of korter bezig met Slinc">
                <p>De eerste 2 tot 3 weken Slinc. zijn cruciaal. Het is belangrijk dat je deze weken strikt volgt. Maak geen uitzonderingen en ben nauwkeurig. Je lichaam heeft tijd nodig om in het proces van vetverbranding te komen. Daarom val je in de eerste 2 weken alleen maar vocht af, geen vet. Gun je lichaam de tijd.</p>
                <p>Vergelijk het lichaam met een oude stoomtrein. Die komt heel langzaam op gang, kolen gaan op het vuur en hij gaat steeds harder rijden, tot die op topsnelheid zit. Zit er dan af en toe wat plastic tussen de kolen, daar gaat die echt niet langzamer van rijden. Maar doe je dat als de trein net pas op gang komt, dan stopt de trein. Zo werkt het in je lichaam ook. Vetverbranding is een proces dat op gang moet komen. Dat duurt gemiddeld 2 tot 3 weken.</p>
                <p>Je lichaam wil helemaal geen vet verbranden, het heet niet voor niets vetreserves. Je lichaam spreekt het pas aan als het echt niet anders kan. Als er een brandstof binnen komt die niet in je programma thuishoort (de plastic tussen de kolen) staakt je lichaam het hele opstartproces en dat zie je terug op de weegschaal.</p>
                <p>Pak het programma gewoon weer op. Schouders eronder en doorgaan! </p>
            </x-faq-list-item>

            <x-faq-list-item title="Ik ben al 4 weken of langer bezig met Slinc">
                <p>Je hebt iets gegeten of gedronken wat niet in het programma past. Dat kan een bewuste keuze zijn of het is toch anders gelopen dan je jezelf had voorgenomen. Blijf daar niet te lang bij stil staan of je rot over voelen. Dat kun je niet meer veranderen. Wat je wel in de hand hebt, is hoe je nu verder gaat.</p>
                <p>Pak je programma weer op en ga door. Let op: het kan zijn dat je de eerste dagen moeilijker vindt om vol te houden. Omdat je met je zondigmoment meer suikers en vetten hebt binnengekregen, gaat je bloedsuikerspiegel weer enorm schommelen. Hierdoor ervaar je weer veel hoge pieken en lage dalen in je bloedsuikerspiegel. En daar heb jij last van. Je lichaam schreeuwt opnieuw om lekkers. Dus als je na je zondigmoment de draad oppakt, zal dat niet zonder protest van je lichaam gaan.</p>
                <p>Het duurt zo'n 3 dagen voordat je bloedsuikerspiegel weer gestabiliseerd is. Houd vol en je zult per dag merken dat het alweer beter gaat. En weet dat na 3 dagen dit gevoel helemaal weer weg is.</p>
                <p>Heb je écht veel te veel gedaan en ben je deze week zelfs aangekomen? Start dan eerst weer met een appeldag.</p>
            </x-faq-list-item>

            <x-faq-list-item title="Heb je geen bami, nasi, chinees, soep, pizza, friet of een kant-en-klaar maaltijd op?">
                <p>Deze maaltijden bevatten veel zout, waardoor je lichaam vocht vasthoudt. Dat geeft een vertekend beeld op de weegschaal. Daarnaast is (afhaal) chinees eten, friet en pizza ook vet. Gebruik voor nasi/bami geen aanmaakzakjes, daar zit ook veel vet in! Gebruik alleen verse kruiden.</p>
            </x-faq-list-item>

            <x-faq-list-item title="Neem je de supplementen consequent in?">
                <p>Neem de supplementen op tijd in en consequent voor het juiste effect. De Shaper 3x per dag een halfuur tot een uur voor de maaltijd, de Fit 3x per dag tijdens of na de maaltijd. Stel een herinnering in deze app en ontvang op tijd een melding.</p>
                <p>Zorg dat je thuis, op je werkplek en in je tas supplementen hebt liggen, dan kun je ze nooit vergeten. Gebruik daarvoor de handige Slinc meeneemblikje.</p>
            </x-faq-list-item>

            <x-faq-list-item title="Heb je 1,5 tot 2 liter water gedronken?">
                <p>Water heeft de beste transportfunctie voor afvalstoffen. Je lichaam kan geen vet verbranden als het lichaam te veel afvalstoffen bevat, omdat bij het verbrandingsproces nieuwe afvalstoffen vrijkomen. Als er te veel afvalstoffen in het lichaam komen, word je ziek. Het lichaam beschermt zichzelf hiertegen en zal geen vet verbranden zolang de aanwezige afvalstoffen niet worden afgevoerd.</p>
                <p>Door te weinig water te drinken is je lichaam dus niet in staat om goed vet te verbranden. Drink dus 1,5 tot 2 liter water per dag, zuiver water, zonder toevoeging van een kunstmatig smaakje, dus ook geen thee. Wel kun je het verfrissen met verse munt of citroen.</p>
                <p>(Kruiden)thee of koffie mag overigens wel als aanvulling worden gedronken, maar niet in plaats van water.</p>
            </x-faq-list-item>

            <x-faq-list-item title="Eet je volkoren crackers?">
                <p>Eet als vrouw 's morgens en 's middags 2 crackers, als man 3. Kies het liefst een cracker uit categorie A. Zeker als je resultaat wat minder goed is. Gebruik de crackers uit categorie B echt alleen ter afwisseling. De crackers in categorie A bevatten de meeste vezels. Die zorgen voor een goede stofwisseling en dus voor een goede vet verbranding. Tevens zorgen vezels voor een hoog verzadigingsgevoel en een goede stoelgang.</p>
            </x-faq-list-item>

            <x-faq-list-item title="Sla je geen tussendoortje over en pak je samen of naast je fruit ook altijd een bakje zuivel?">
                <p>Om de 2 à 2,5 uur eten is belangrijk om de stofwisseling optimaal te houden en daarmee een zo hoog mogelijke vetverbranding te creëren. Deze mag je dus niet overslaan. Zit je in een vergadering of ben je onderweg? Doe thuis yoghurt in de blender met fruit, giet het in een afsluitbare beker en je hebt een drinkbaar tussendoortje. Makkelijk en niemand die ziet dat je aan het 'eten' bent.</p>
            </x-faq-list-item>

            <x-faq-list-item title="Eet je groente bij je crackers in de middag? En varieer je voldoende met groente?">
                <p>Groente bij de crackers zorgt onder andere voor vulling en vezels. Je hebt daardoor minder honger en de vezels zorgen voor een goede stofwisseling en dus een goede vetverbranding. Ook gaat hierdoor je stoelgang beter. Groente moet je in de middag minimaal 200 gram eten, elke dag.</p>
                <p>Pas op dat je niet te snel blijft steken op alleen komkommer, omdat het zo makkelijk is om mee te nemen. Variatie is belangrijk. Denk aan rauwe groente als (snoep)tomaat, paprika in reepjes, radijs, augurk, wortel, maar denk ook aan rauwe bloemkool.</p>
                <p>Heb je wat meer tijd? Maak een simpele salade. Doe er een keer tonijn op waterbasis doorheen, een klein uitje fijngesneden en wat olie erover, peper en zout. Dat is een heerlijk beleg voor je cracker en je krijgt meteen alles binnen.</p>
                <p>Maar ook warme groente kan natuurlijk als je ’s middags tijd hebt. Wokgroente, champignons, ui, boontjes etc. of warm gewoon de overgebleven groente op van de avond ervoor.</p>
            </x-faq-list-item>

            <x-faq-list-item title="Varieer je voldoende?">
                <p>Het is belangrijk dat je verschillende vezels, vitaminen en mineralen binnenkrijgt. Je lichaam blijft op deze manier getriggert en je stofwisseling is hierdoor optimaal. Als je Slinc al een tijdje volgt, sluipt vaak het gevaar erin dat je vaak hetzelfde eet. Dezelfde crackers, altijd kaas, altijd een appel als tussendoortje, altijd yoghurt, altijd alleen maar komkommer als groente etc.</p>
                <p>Probeer deze week alles wat je eet te vervangen door iets anders. Ga per eetmoment na: wat eet ik normaal en wat kan ik daar anders voor in de plaats eten. Pak je voedingslijst en ga alle eetmomenten na.</p>
                <p class="font-bold">Voorbeeld:</p>
                <p class="font-bold">Ik eet als ontbijt / lunch:</p>
                <p>Opties:<br>Eet een andere cracker. Je kunt bijvoorbeeld 2 volkoren crackers eten van een huismerk. Of kies voor 2 verschillende crackers. 1x Lu voltarwe (deze staat niet als zodanig genoemd in de lijst, maar je mag alle volkoren crackers eten!) en 1x een volkoren cracker eigen merk. Kies een ander soort beleg dan je gewend bent. Eet je altijd kaas, neem eens een vleessoort of andersom. Denk ook aan smeerbare producten, magere smeerkaas of zuivelspread. Of een keer een ei of vis! Kijk bij de recepten voor heerlijke variatie ideeën!</p>
                <p class="font-bold">Ik eet als tussendoortje:</p>
                <p>Appel of mandarijn met een kuipje Vitalinea (omdat het een handig formaat is).</p>
                <p>Elk tussendoormoment neem je iets anders qua fruit. Er zijn zoveel heerlijke fruitsoorten die je mag. Kies voor 4 of 5 verschillende fruitsoorten en eet daar heel de week van. Eet tijdens je tussendoortje in de ochtend altijd iets anders dan in de middag.</p>
                <p>Misschien vind je fruit te bewerkelijk op je werk of onderweg? Zorg dat je voorbereid bent. Snijd ’s avonds of ’s ochtends je fruit en doe het in een bakje en neem het mee. Of maak een lekkere mix van verschillende fruitsoorten. Je kunt ook thuis fruit mixen met magere yoghurt in de blender. Je kunt ook hier ook ingevroren fruit voor gebruiken, heerlijk fris! Neem het mee in een beker, heel handig als tussendoortje tijdens een vergadering.</p>
                <p>Varieer ook in je zuivel. Wissel een bakje yoghurt af met een beker magere melk of karnemelk. Zet een pak magere melk of karnemelk in de ijskast op je werk, neem het mee in een beker en zet het in je koelbox in de auto. Een bakje magere yoghurt met een stuk fruit kan natuurlijk altijd.</p>
                <p>Een appel in stukjes door je yoghurt met een beetje kaneel, alsof je een appeltaartje eet, heerlijk.</p>
                <p class="font-bold">Ik eet ’s middags alleen komkommer en tomaat bij mijn cracker. Of erger nog: ik eet geen groente bij mijn crackers.</p>
                <ul>
                    <li class="content-li">Lees hier <a href="https://rachelhulshof.nl/blog/tips-die-groente-eten-leuk-maken/" target="_blank">tips voor variatie van groente</a> bij je cracker</li>
                    <li class="content-li">Voor variatie in het avondeten: kijk bij onze <a href="https://rachelhulshof.nl/recepten/" target="_blank">Recepten</a></li>
                </ul>
                <p>Succes deze week! Lees ter motivatie ook de weblog: <a href="https://rachelhulshof.nl/blog/doorbreek-gewoonte-met-variatie/" target="_blank">doorbreek gewoonte met variatie</a></p>
            </x-faq-list-item>

            <x-faq-list-item title="Eet je ’s avonds 100 gram gekookte rijst, pasta of aardappelen?">
                <p>Ben niet bang om koolhydraten te eten. Veel vrouwen hebben de illusie dat je sneller afvalt als je die weglaat. Dat is niet zo. Slinc is perfect uitgebalanceerd. In het moment zelf lukt het je wel en zit je vol. Maar vaak heb je er de volgende dag last van en ervaar je meer honger overdag.</p>
                <p>Daarnaast verslechtert het resultaat juist eerder dan dat het verbetert. Eet in de avond dus gewoon je koolhydraten. Tenzij in een Slinc recept anders staat vermeld. De koolhydraten worden dan vaak gecompenseerd met ander voedzaam eten.</p>
                <p>Let op: 50 gram ongekookte rijst of pasta is 100 gram gekookt. Ben nauwkeurig en weeg het af, niet op het blote oog, dan schep je altijd meer op.</p>
                <p>Mis je brood? Eet in de avond een keer 2 sneetjes volkorenbrood, lekker met een ei en sla of rooster de boterham, lekker met biefstuk en champignons.</p>
            </x-faq-list-item>

            <x-faq-list-item title="Heb je op hetzelfde tijdstip gewogen?">
                <p>In de avond ben je als vrouw ongeveer 1kg zwaarder, als man 1,5kg. Weeg je ’s ochtends schoon aan de haak 70 kg dan weeg je als vrouw ’s avonds 71 kg. Dus het is belangrijk dat je een weegmoment op hetzelfde tijdstip aanhoudt, anders krijg je een vertekend beeld.</p>
            </x-faq-list-item>

            <x-faq-list-item title="Gaat je stoelgang slecht?">
                <p>Je krijgt tijdens Slinc minder vezels en vetten binnen dan gebruikelijk, waardoor de stoelgang kan verslechteren. Dit kan resulteren in een opgeblazen gevoel, harde ontlasting of langdurige verstopping. Het geeft een vervelend gevoel en je resultaat in gewichtsafname is hierdoor ook minder. Het is daarom belangrijk dat je voldoende water (2 liter) drinkt, veel rauwe (groene) groentes eet en lijnzaadolie gebruikt als dressing door de salade. Helpt dit niet voldoende dan kun je het volgende doen:</p>
                <ul>
                    <li>Of: 2 groene kiwi’s op nuchtere maag (voor de Slinc Shaper en als extra eetmoment!)</li>
                    <li>Of: Zwarte koffie op nuchtere maag</li>
                    <li>Of: Een groot glas lauw water op nuchtere maag</li>
                    <li>En: Eet pruimen als fruit tijdens uw tussendoortje</li>
                </ul>
                <p>Ben je al langere tijd niet naar de toilet geweest? Dan is het beter om een licht laxerend tablet Ortilax te gebruiken om de darmen direct te prikkelen. Ortilax is een plantaardig product en zorgt slechts voor een lichte prikkel waardoor er geen diarree optreedt. Ortilax tabletten kun je blijven gebruiken om de stoelgang op peil te houden zolang je Slinc volgt.</p>
            </x-faq-list-item>

            <x-faq-list-item title="Heb je last van een hongergevoel">
                <p>‘Honger’ is the number one enemy als je aan het afvallen bent. Er is niets zo vervelend tijdens afvallen als dat lege gevoel in je maag. Met Slinc mag je absoluut geen honger ‘lijden’. Als je teveel honger hebt dan kunnen er 3 dingen aan de hand zijn:</p>
                <ul>
                    <li>Je resultaat is uitzonderlijk goed. Je hebt een hoge stofwisseling</li>
                    <li>Je hebt het programma niet goed gevolgd, waardoor je bloedsuikerspiegel teveel schommelt</li>
                    <li>Hormonaal (dit geldt alleen voor vrouwen)</li>
                </ul>

                <p class="font-bold">1. Je resultaat is uitzonderlijk goed. Je hebt een hoge stofwisseling</p>

                <p>Ben je als vrouw tot nu toe gemiddeld 1,5kg per week of meer afgevallen, als man 2kg per week of meer? Heb jij als vrouw een weegresultaat van 2kg of meer ertussen, als man 2,5kg of meer? Dan zeg ik gefeliciteerd! You’re blessed… met een hoge stofwisseling. En dan is het goede nieuws: dan mág je, wat zeg ik, móet je heel veel (voedzaam) eten.</p>

                <p>Hoe hoger je stofwisseling, hoe meer je lichaam dus vraagt om brandstof om goed te kunnen functioneren. Honger is niets anders dan een signaal van het lichaam dat die brandstof nodig heeft. Dus als je honger hebt tijdens Fase 1 Afslanken en je resultaten voldoen aan bovenstaande voorwaarden, dan mag je dus meer eten. Moet je zelfs meer eten! Je lichaam geeft het aan. En je zult zien, hoe meer je eet, hoe beter je lichaam functioneert. Je gaat je beter voelen, minder slap, duizelig, meer energievol. En denk nu alsjeblieft niet: ‘Ga ik dan niet minder afvallen?’ Nee. Geloof me, het zal geen negatieve invloed hebben op je resultaat</p>

                <p>Wat kun je dan extra eten? Het ligt eraan wanneer je vooral een hongermoment ervaart. Hieronder de mogelijkheden</p>

                <ul>
                    <li>
                        <span class="font-bold">Ik vind de tijd tussen de hoofdmaaltijden te lang duren</span><br>Heb je teveel honger tussen je hoofdmaaltijden in, ondanks het tussendoortje wat je mag? Om 11.30 al honger hebben, terwijl je pas om 13.00 uur gaat lunchen of de bekende 16.00 uur dip. Wat je dan kunt doen, is een extra fruit en zuivel moment inlassen of groente eten. Bijvoorbeeld: je luncht om 12.30 uur, eet fruit en zuivel om 14.30 uur en om 16.00 – 16.30 uur eet je nog een keer fruit en zuivel. Of je pakt dan om 16.00 uur een stuk komkommer en tomaat of je eet een salade. Heb je in de ochtend én in de middag teveel honger, eet dan:
                        <ul>
                            <li>als ontbijt een éxtra cracker en eet in de middag een éxtra fruit en zuivel moment óf</li>
                            <li>in de ochtend een éxtra fruit en zuivel moment en met de lunch een éxtra cracker</li>
                        </ul>
                    </li>

                    <li>
                        <span class="font-bold">Ik heb niet genoeg aan mijn ontbijt en/of lunch, ik zit nog niet vol</span><br>Eet dan een cracker extra. Dat mag zowel bij het ontbijt als bij de lunch. Als vrouw eet je dan 3 crackers ’s ochtends en 3 crackers ’s middags, als man eet je dan 4 crackers. Je kunt er ook voor kiezen om alleen bij het ontbijt of alleen bij de lunch een cracker extra te eten. Zorg dat je tijdens de lunch wel goed groente blijft eten. Eet je groente altijd eerst op, daarna pas de crackers, dat geeft meer voldoening. Inspiratieloos met groente in de middag? Kijk hier voor wat variatietips.
                    </li>

                    <li><span class="font-bold">Ik heb ’s avonds na het eten trek</span>Neem ’s avonds nog een extra stuk fruit in je toetje. Dat vult meer dan alleen maar zuivel. Doe dat ergens tussen 19.00 en 22.00 uur. Altijd uiterlijk 1 uur voordat je naar bed gaat. Maar de stelregel is: niet met honger naar bed! Heb je echt nog honger laat op de avond? Neem dan nog even een glas melk, bakje yoghurt of vla voordat je naar bed gaat.</li>

                    <li><span class="font-bold">Ik heb niet genoeg aan mijn avondeten</span>Kies dan voor optie 1 óf optie 2. Als je tijdens het avondeten teveel honger hebt, komt dat vaak omdat je overdag te weinig eet. Misschien ervaar je dat niet zo, omdat je de hele dag druk bezig bent en je hongergevoel niet voelt. Stress, adrenaline, drukte onderdrukt waar je lichaam eigenlijk wel al heel de dag om vraagt en behoefte aan heeft. Je komt ’s avonds tot rust en dan pas voel je waar je lichaam eigenlijk al heel de dag om vraagt en inmiddels al bijna uitschreeuwt! En dat resulteert in té veel honger en té weinig weerstand, oftewel: 2 volle borden avondeten. Voorkom teveel trek en eet overdag meer. Kies voor optie 1 of 2. Mocht dat niet de oplossing voor je zijn is er nog een alternatief. Eet een halfuur of kwartier voordat je gaat eten alvast wat groente. Terwijl je staat te koken bijvoorbeeld, een stuk komkommer. Of in de auto op weg naar huis, eet je uit je trommeltje wat snoeptomaatjes en stukjes paprika. Je slaat dan 2 vliegen in 1 klap: je eerste honger is al iets gestild en je hebt meteen ook al wat groente op!<br>Een hoge stofwisseling betekent overigens ook dat je goed op gewicht kunt blijven. Je zult zelf misschien tot nu toe in je leven heel anders ervaren, maar geloof me, jij kunt heel goed op gewicht blijven. Dat ga ik je allemaal nog leren. Voor nu: keep up the good work, you’re doing great.</li>
                </ul>

                <p class="font-bold"></p>
            </x-faq-list-item>

            <x-faq-list-item title="">
                
            </x-faq-list-item>

            <x-faq-list-item title="">
                
            </x-faq-list-item>

            <x-faq-list-item title="">
                
            </x-faq-list-item>
        </x-faq-list>
    </div>
@endsection