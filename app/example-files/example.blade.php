@extends('gocompare.templates.app')

@section('content')
    <section class="standard-page">
        <div>
            <p class="font-semibold">
                Discover what broadband speed you need to watch top streaming services like Netflix, Prime Video and
                YouTube.
            </p>
            <p>
                Most households have at least one TV subscription, whether it’s to binge-watch or bring your mates over
                for a Premier League game.
            </p>
            <p>
                But how do you know what
                <a href="{{ $gocoRoute('gocompare.speed') }}"> broadband speed</a> is right for platforms like Netflix and Prime Video? And what
                should you do if you’re tired of constant buffering during your favourite sitcoms?
            </p>
            <p>We’ve got all the details you need.</p>
            <p class="italic">Are you out of contract and looking to switch your broadband provider? Discover how
                to find the
                <a href="{{ $gocoRoute('broadband-deals') }}">best broadband deals</a>
                in the market now.
            </p>

            <h2>What broadband speed do I need for Netflix and other streaming services?</h2>
            <p>
                The broadband speed you need for streaming services depends on each platform and can range from 1Mbps
                to 25Mbps.
            </p>
            <p>
                To give you an idea, we’ve rounded up the recommended speeds for some of the most popular streaming
                services.
            </p>
            <p>
                Keep in mind that these are the recommended speeds for streaming. If you use the internet for browsing
                or gaming on top of that, you’ll need more than this.
            </p>

            <div class="overflow-x-auto">
                <div
                    class="border-2 border-goco-dark-green mt-2 min-w-[1000px] lg:w-4/5 [&>div]:border-b
                        [&>div]:border-goco-dark-green"
                >
                    <div class="grid grid-cols-4 text-center [&_div]:bg-gray-200 [&_div]:p-1 font-semibold">
                        <div>
                            Streaming service
                        </div>
                        <div class="border-x border-goco-dark-green">
                            SD
                        </div>
                        <div>
                            HD
                        </div>
                        <div class="border-x border-goco-dark-green">
                            4K
                        </div>
                    </div>
                    <div class="grid grid-cols-4 text-center [&_div]:p-1">
                        <div>
                            Amazon Prime Video
                        </div>
                        <div class="border-x border-goco-dark-green">
                            1Mbps
                        </div>
                        <div>
                            5Mbps
                        </div>
                        <div class="border-x border-goco-dark-green">
                            25Mbps
                        </div>
                    </div>
                    <div class="grid grid-cols-4 text-center [&_div]:p-1">
                        <div>
                            Apple TV Plus
                        </div>
                        <div class="border-x border-goco-dark-green">
                            2.5Mbps
                        </div>
                        <div>
                            8Mbps
                        </div>
                        <div class="border-x border-goco-dark-green">
                            25Mbps
                        </div>
                    </div>
                    <div class="grid grid-cols-4 text-center [&_div]:p-1">
                        <div>
                            BBC iPlayer
                        </div>
                        <div class="border-x border-goco-dark-green">
                            1.5Mbps
                        </div>
                        <div>
                            5Mbps
                        </div>
                        <div class="border-x border-goco-dark-green">
                            24Mbps
                        </div>
                    </div>
                    <div class="grid grid-cols-4 text-center [&_div]:p-1">
                        <div>
                            Disney Plus
                        </div>
                        <div class="border-x border-goco-dark-green">
                            N/A
                        </div>
                        <div>
                            5Mbps
                        </div>
                        <div class="border-x border-goco-dark-green">
                            25Mbps
                        </div>
                    </div>
                    <div class="grid grid-cols-4 text-center [&_div]:p-1">
                        <div>
                            ITV Hub
                        </div>
                        <div class="border-x border-goco-dark-green">
                            3Mbps
                        </div>
                        <div>
                            N/A
                        </div>
                        <div class="border-x border-goco-dark-green">
                            N/A
                        </div>
                    </div>
                    <div class="grid grid-cols-4 text-center [&_div]:p-1">
                        <div>
                            Netflix
                        </div>
                        <div class="border-x border-goco-dark-green">
                            3Mbps
                        </div>
                        <div>
                            5Mbps
                        </div>
                        <div class="border-x border-goco-dark-green">
                            15Mbps
                        </div>
                    </div>
                    <div class="grid grid-cols-4 text-center [&_div]:p-1">
                        <div>
                            NOW TV
                        </div>
                        <div class="border-x border-goco-dark-green">
                            2.5Mbps
                        </div>
                        <div>
                            12Mbps
                        </div>
                        <div class="border-x border-goco-dark-green">
                            N/A
                        </div>
                    </div>
                    <div class="grid grid-cols-4 text-center [&_div]:p-1">
                        <div>
                            TNT Sports
                        </div>
                        <div class="border-x border-goco-dark-green">
                            3.5Mbps
                        </div>
                        <div>
                            8Mbps
                        </div>
                        <div class="border-x border-goco-dark-green">
                            30Mbps
                        </div>
                    </div>
                    <div class="grid grid-cols-4 text-center [&_div]:p-1">
                        <div>
                            Youtube
                        </div>
                        <div class="border-x border-goco-dark-green">
                            1.1Mbps
                        </div>
                        <div>
                            5Mbps
                        </div>
                        <div class="border-x border-goco-dark-green">
                            20Mbps
                        </div>
                    </div>
                </div>
            </div>

            <h2>What broadband speed do I need for Amazon Prime Video?</h2>
            <p>
                For Amazon Prime Video, you need at least a minimum download speed of 1Mbps for SD and 5Mbps for HD.
                If you stream movies and TV shows in 4K, it’s 25Mbps.
            </p>
            <p>
                You can stream in 4K Ultra HD if you have a Prime Video membership. But you need a good broadband
                speed for this to work.
            </p>
            <p>
                To stream on Prime Video, you can use the web, app, smartphone, tablet, set-top box, game console or
                smart TV.
            </p>

            <h3>Should I get Amazon Prime Video?</h3>
            <p>
                If you shop online a lot, chances are that you already have Amazon Prime Video for free. This is if you
                have a £8.99 subscription to Amazon Prime.
            </p>
            <p>
                You can sign up for Prime Video for £5.99. Keep in mind that this comes without any of the Prime
                benefits.
            </p>
            <p>
                With Prime Video, you can watch popular movies like The Lord of the Rings and TV shows like The Boys.
                Plus, you get to watch live sports, such as the Premier League.
            </p>
            <p>We’ve rounded up the best Amazon Prime Video deals if you’re planning to get a subscription.</p>

            <h2>What broadband speed do I need for Apple TV Plus?</h2>
            <p>For Apple TV Plus, you need at least 2.5Mbps for SD and 8Mbps for HD.</p>
            <p>
                For 4K streaming, you require a minimum of 25Mbps and can go up to 41Mbps for UHD content. Depending
                on your broadband speed at home, the streaming quality can change. But anything over 8Mbps means that
                you can stream with ease.
            </p>
            <p>To stream on Apple TV Plus, you can use the Apple TV app, iOS devices or the web.</p>

            <h3>Should I get Apple TV Plus?</h3>
            <p>
                There are a lot of Apple TV Plus offers in the market and you can get up to 24 months for free. If you
                purchase a brand new Apple product like an
                <a href="https://www.gocompare.com/mobile-phone/iphone/">iPhone</a>
                or a Mac, you can get a three-month free trial for Apple TV Plus.
            </p>
            <p>You can watch exclusive content such as Ted Lasso, The Morning Show and CODA.</p>

            <h2>What broadband speed do I need for BBC iPlayer?</h2>
            <p>BBC iPlayer recommends a download speed of anywhere between 1.5Mbps to 5Mbps.</p>
            <p>Although there isn’t a huge catalogue of 4K content on it, you would need 24Mbps to stream any of it.</p>

            <h3>Should I get BBC iPlayer?</h3>
            <p>
                BBC iPlayer is a free video-on-demand service from the BBC with no commercial ads. You can stream it on
                the app, smartphone, tablet, computer, smart TV and Amazon.
            </p>
            <p>
                All you need is a TV licence and you can enjoy David Attenborough, EastEnders, BBC Radio and Strictly
                Come Dancing. Sports enthusiasts can also watch Match of the Day or any live streaming.
            </p>

            <h2>What broadband speed do I need for Disney Plus?</h2>
            <p>Disney Plus requires a minimum speed of 5Mbps for HD content and 25Mbps for 4K UHD streaming.</p>
            <p>
                If you have a lower speed, it can impact your streaming quality. Make sure that you stream using one of
                the supported devices.
            </p>
            <p>
                These include web browsers, smartphones, tablets, streaming sticks, gaming consoles, smart TVs and
                set-top boxes.
            </p>

            <h3>Should I get Disney Plus?</h3>
            <p>
                With Disney Plus, you can watch timeless classics like Toy Story, The Little Mermaid or The Lion King.
            </p>
            <p>
                You can also watch the Marvel Cinematic Universe, the Star Wars series or National Geographic
                documentaries.
            </p>
            <p>Discover the best Disney Plus deals available if you’re thinking about getting a subscription.</p>

            <h2>What broadband speed do I need for ITV Hub?</h2>
            <p>
                To stream on ITV Hub, you just need a minimum of 0.8Mbps. This is less than BBC iPlayer, and you won’t
                have to worry too much about your broadband speed.
            </p>
            <p>
                There is no HD streaming, so you just need around 3Mbps to stream on ITV Hub easily. You can stream on
                ITV Hub using your phone, tablet, computer or smart TV.
            </p>

            <h3>Should I get ITV Hub?</h3>
            <p>
                The ITV Hub basically consists of everything from CITV and ITV2. You can watch any of the ITV channels,
                and most of them are free.
            </p>
            <p>
                The only thing you will have to pay for is a TV licence fee. Or for ad-free streaming, you pay for
                ITVX Premium which comes with Britbox and Studiocanal Presents.
            </p>
            <p>
                You can watch a lot of exclusive ITVX content such as international films, popular TV shows and movies.
                Popular shows include Good Will Hunting, The Vampire Diaries and Love Island.
            </p>

            <h2>What broadband speed do I need for Netflix?</h2>
            <p>
                On Netflix, you need a download speed of at least 3-5Mbps for HD streaming. If you stream in UHD, you
                will need 15Mbps or higher to watch TV shows and movies.
            </p>
            <p>
                Although you can use Netflix at speeds as low as 0.5Mbps, the quality will be poor. So try aiming for
                anything above 3Mbps and you can stream seamlessly. However, this comes at a price, so check before you
                take out a Netflix subscription.
            </p>
            <p>
                Standard and premium subscribers can download TV shows and movies from Netflix. You can stream Netflix
                through a smartphone, laptop, smart TV, gaming console, media player, set-top box, web browser or
                tablet.
            </p>

            <h3>Should I get Netflix?</h3>
            <p>
                Some of the most popular TV shows on Netflix are Beef, The Crown, Sex Education, Stranger Things and
                Love is Blind.
            </p>
            <p>
                You can watch movies like Knives Out, Once Upon a Time in… Hollywood, Paddington and all of the Harry
                Potter movies.
            </p>
            <p>
                Sports fans can watch sports documentaries like Beckham, Tour de France and Formula 1: Drive to
                Survive.
            </p>

            <h2>What broadband speed do I need for NOW TV?</h2>
            <p>
                For NOW TV, you need a minimum of 2.5Mbps to 12Mbps for streaming in SD or low-end HD (720p). If you’re
                using 3G or 4G, you just need 0.45Mbps.
            </p>
            <p>
                However, having slightly more internet bandwidth is helpful so that you don’t struggle with lagging or
                buffering while streaming.
            </p>
            <p>
                You can stream on NOW TV with laptops, computers, tablets, smartphones, gaming consoles and NOW
                devices.
            </p>

            <h3>Should I get NOW TV?</h3>
            <p>NOW is Sky’s on-demand streaming service, where you can watch movies, TV shows and live sports.</p>
            <p>
                You can opt for an Entertainment or Cinema Pass or a day/monthly NOW Sky Sports membership. The Sports
                membership lets you watch all the live events, including cricket, football and golf.
            </p>
            <p>
                With NOW, you’ll be able to watch Game of Thrones, Succession, Law and Order and many more TV shows.
                You also get access to films, like Knock at the Cabin, M3GAN, The Hunger Games and Babylon.
            </p>

            <h2>What broadband speed do I need for TNT Sports?</h2>
            <p>
                TNT Sports, formerly BT Sport, will need at least 3.5Mbps for SD and 8Mbps for HD streaming. For UHD 4K
                streaming, you will require a broadband speed of at least 30Mbps.
            </p>
            <p>
                The minimum speed you can use to stream on TNT Sports is 0.4Mbps. However, the last thing you want is
                to miss out on any touch of the ball during a game. So make sure to have at least 3.5Mbps broadband
                speed.
            </p>

            <h3>Should I get TNT Sports?</h3>
            <p>
                If you love watching live football games, you should consider getting TNT Sports. You get access to
                Premier League matches, UEFA Champions League, UEFA Europa League matches and FA Cup.
            </p>
            <p>
                With TNT Sports, you can also watch cricket, rugby, hockey, boxing, motorsport and baseball matches.
            </p>

            <h2>What broadband speed do I need for Youtube?</h2>
            <p>
                YouTube recommends a broadband speed of at least 1.1Mbps to 5Mbps for SD and HD streaming. For UHD, 4K
                or 2160p, you will need at least 20Mbps.
            </p>
            <p>To give you a good viewing experience, YouTube automatically changes the video resolution.</p>
            <p>
                To give you the best viewing experience, YouTube dynamically adjusts the video resolution based on your
                internet speed. This helps prevent buffering interruptions while you watch.
            </p>
            <p>
                You can stream on YouTube using smartphones, tablets, gaming consoles and smart TVs. Streaming devices
                like Apple TV and Chromecast are also compatible.
            </p>

            <h3>Should I get YouTube?</h3>
            <p>
                YouTube is free to use and you can watch news, movies, TV shows, comedies, sports, music videos and
                much more. YouTube Premium is paid, but you can watch YouTube ad-free and play it in the background.
            </p>
            <p>
                You can watch Life of Pi, The Truman Show, Sky Sports Football highlights and Kitchen Nightmares. Plus,
                there are Channel 4 Documentaries, Comedy Central Stand-Ups and music videos by your favourite artists.
            </p>

            <h2>What broadband speed do I need for streaming on multiple devices?</h2>
            <p>
                For those who live in a larger household, you will need more bandwidth for streaming. Suppose you live
                in a four-person household, two of which are kids. You will already be using around 10-15Mbps for
                streaming YouTube and Netflix everyday.
            </p>
            <p>
                It’s also important to note how many devices are going to be streaming at the same time. If this has
                video calls, online gaming and streaming altogether, you will need a lot more Mbps.
            </p>
            <p>
                When you’re looking for a
                <a href="{{ $gocoRoute('broadband-deals') }}">broadband deal</a>,
                here are the speeds you should keep in mind.
            </p>
            <div class="overflow-x-auto">
                <div
                    class="border-2 border-goco-dark-green mt-2 min-w-[1000px] lg:w-3/5 [&>div]:border-b
                        [&>div]:border-goco-dark-green"
                >
                    <div class="grid grid-cols-2 text-center [&_div]:bg-gray-200 [&_div]:p-1 font-semibold">
                        <div>
                            Number of devices
                        </div>
                        <div class="border-x border-goco-dark-green">
                            Recommended Download Speed
                        </div>
                    </div>
                    <div class="grid grid-cols-2 text-center [&_div]:p-1">
                        <div>
                            1-2
                        </div>
                        <div class="border-x border-goco-dark-green">
                            Up to 25 Mbps
                        </div>
                    </div>
                    <div class="grid grid-cols-2 text-center [&_div]:p-1">
                        <div>
                            3-5
                        </div>
                        <div class="border-x border-goco-dark-green">
                            50 - 100 Mbps
                        </div>
                    </div>
                    <div class="grid grid-cols-2 text-center [&_div]:p-1">
                        <div>
                            5+
                        </div>
                        <div class="border-x border-goco-dark-green">
                            150 to 200 Mbps
                        </div>
                    </div>
                </div>
            </div>

            <h2>What is upload speed and download speed?</h2>
            <p>When you are using streaming services, the terms upload speed and download speed will be used.</p>
            <p>We’ve explained the difference between the two, and why you will need it.</p>

            <h3>Upload speed</h3>
            <p>
                Upload speed means how fast you can send stuff from your computer to any device or internet server.
                You will need a good upload speed to send emails, play online games or do video calls.
            </p>
            <p>
                Upload speed is not important when you’re watching content on streaming platforms. This is because
                your device mainly downloads data instead of uploading it. It makes your playback speed smoother so you
                can watch TV shows and movies seamlessly.
            </p>
            <p>
                <span class="font-semibold">Good upload speed:</span> Minimum of 5Mbps.
            </p>

            <h3>Download speed</h3>
            <p>
                Download speed means the amount of Mbps it takes to download data from the internet to your device.
                This can be images, videos, texts, files and audio.
            </p>
            <p>
                It also refers to things like music streaming, downloading large files or streaming any content online.
                This downloaded content is stored temporarily in your device’s storage so that you don’t face any
                interruptions while watching it.
            </p>
            <p>
                <span class="font-semibold">Good download speed:</span> Minimum of 25Mbps.
            </p>

            <h2>How do I check my broadband speed?</h2>
            <p>
                Make use of our
                <a href="{{ $gocoRoute('gocompare.speed') }}">broadband speed checker</a>
                to see if you’re getting the advertised speeds by your broadband provider.
            </p>
            <p>
                If not, try
                <a href="{{ $gocoRoute('gocompare.how-to-haggle-and-get-the-best-deals') }}">
                    haggling with your broadband provider
                </a>
                or see if you can switch.
            </p>
        </div>
    </section>
@endsection
