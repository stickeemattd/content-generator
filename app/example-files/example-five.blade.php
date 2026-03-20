@extends('gocompare.templates.app')

@section('content')
    <section class="standard-page">
        <div>
            <h2>Find the right EE broadband deal for you</h2>
            <p>
                We’ve got some great EE broadband deals, so use our table to compare plans and find one that delivers
                what you want. Whether you’re after a cheap broadband deal or one that delivers 1 Gbps+ speeds, there
                are deals available to suit your needs.
            </p>

            <h2>Who owns EE broadband?</h2>
            <p>
                As part of the
                <a href="{{ $gocoRoute('gocompare.bt-deals') }}">BT</a>
                Group, EE is one of the biggest communications providers in the UK. It can provide
                <a href="{{ $gocoRoute('gocompare.speed') }}">broadband speeds</a>
                of up to 1.6Gbps.
            </p>
            <p>
                Plus, you get a great range of
                <a href="{{ $gocoRoute('broadband-deals') }}">broadband deals</a>
                including
                <a href="{{ $gocoRoute('broadband-deals') }}">broadband only</a>,
                <a href="{{ $gocoRoute('gocompare.digital-television') }}">broadband and TV deals</a>
                and quad-play deals.
            </p>

            <h2>Why should I choose EE broadband?</h2>
            <ul>
                <li>Powered by BT, EE is a major UK broadband provider</li>
                <li>It has some of the fastest download speeds currently available</li>
                <li>
                    You can add unlimited data SIMs from £11.50 a month for your household, if you're an EE One
                    customer, who has broadband and mobile bundled together
                </li>
                <li>
                    Some EE plans come with personalised modes that allow you to boost your broadband connectivity for
                    specific apps
                </li>
                <li>
                    With these flexible streaming and data opportunities, EE customers get the choice between a wide
                    range of EE broadband deals
                </li>
            </ul>

            <h2>What types of EE broadband are available and what speeds can I get?</h2>
            <p>
                EE offers a wide range of broadband packages with speeds and features optimised for specific user
                needs.
            </p>
            <p>Some of the current EE broadband packages you can choose from include:</p>

            <h3>EE fibre broadband</h3>
            <p>
                Depending on which package you choose, EE full fibre has the capacity to connect over 190 devices at
                once. So you can enjoy smoother, more reliable internet.
            </p>
            <p>Currently, typical EE full fibre broadband speeds are:</p>
            <ul>
                <li>Full Fibre 74Mbps - 74Mbps download, 20Mbps upload, 37Mbps speed guarantee</li>
                <li>Full Fibre 300Mbps - 208Mbps download, 51Mbps upload, 150Mbps speed guarantee</li>
                <li>Full Fibre 1.6Gbps - 1.6Gbps download, 115Mbps upload, 1.3Gbps speed guarantee</li>
            </ul>
            <p>
                Powered by EE’s advanced Smart Hub Pro router, EE full fibre also lets you control your home’s
                connectivity from the EE app. This includes pausing the Wi-Fi at bedtime.
            </p>

            <h3>EE hybrid broadband</h3>
            <p>
                EE also has a hybrid fibre package, which uses fibre optic cables to connect your home to the local
                telephone exchange via the nearest street cabinet.
            </p>
            <p>Typical hybrid fibre speeds with EE are:</p>
            <ul>
                <li>66-74Mbps download</li>
                <li>20Mbps upload</li>
            </ul>
            <p>
                You also get a speed guarantee of 37Mbps. This means that if you don’t consistently receive this speed
                with EE broadband, you can notify them to fix it.
            </p>
            <p>
                As per
                <a
                    href="https://www.ofcom.org.uk/phones-and-broadband/coverage-and-speeds/broadband-speeds-code-practice"
                    target="_blank" rel="noreferrer"
                >
                Ofcom regulations</a>,
                they’ll have 30 days to fix the problem, or you can leave your contract without paying an exit fee.
            </p>

            <h3>EE One</h3>
            <p>
                You can get unlimited data mobile and SIM deals through EE One if you’re an EE broadband and mobile
                customer. You must have a pay monthly or SIM plan with EE alongside your broadband. If you’re a
                broadband and TV customer, you’ll need an eligible EE Mobile plan to qualify.
            </p>
            <p>
                EE unlimited data SIMs currently cost £11.50, and are available if you’re on an existing eligible plan
                costing £10 a month or more. EE estimates that EE One could save you £480 over two years.
            </p>

            <h2>How much is EE broadband per month?</h2>
            <p>
                At the time of writing, EE broadband packages range from £25.99 to £59.99 a month, depending on which
                package you choose.
            </p>
            <p>
                Each of the plans available at the moment are subject to
                <a href="{{ $gocoRoute('gocompare.mid-contract-price-hikes') }}">mid-contract price rises</a>,
                so the monthly costwill increase in April. Here, we’ve broken down some of EE’s price plans to
                illustrate how much you’d end up paying per month over a 24-month contract:
            </p>
            <p>EE broadband is currently priced as follows:</p>

            <div class="overflow-x-auto">
                <div
                    class="border-2 border-goco-dark-green mt-2 min-w-[1000px] lg:w-4/5 [&>div]:border-b
                        [&>div]:border-goco-dark-green"
                >
                    <div class="grid grid-cols-5 text-center [&_div]:bg-gray-200 [&_div]:p-1">
                        <div class="border-x border-goco-dark-green">
                            Package
                        </div>
                        <div>Price in 2025</div>
                        <div class="border-x border-goco-dark-green">
                            Price in 2026
                        </div>
                        <div>Price in 2027</div>
                        <div class="border-x border-goco-dark-green">
                            One-off charges
                        </div>
                    </div>
                    <div class="grid grid-cols-5 text-center [&_div]:p-1">
                        <div class="border-x border-goco-dark-green">
                            Fibre - 67 Mbps
                        </div>
                        <div>£25.99</div>
                        <div class="border-x border-goco-dark-green">
                            £29.99
                        </div>
                        <div>£33.99</div>
                        <div class="border-x border-goco-dark-green">
                            £9.99
                        </div>
                    </div>
                    <div class="grid grid-cols-5 text-center [&_div]:p-1">
                        <div class="border-x border-goco-dark-green">
                            Full Fibre - 74 Mbps
                        </div>
                        <div>£25.99</div>
                        <div class="border-x border-goco-dark-green">
                            £29.99
                        </div>
                        <div>£33.99</div>
                        <div class="border-x border-goco-dark-green">
                            N/A
                        </div>
                    </div>
                    <div class="grid grid-cols-5 text-center [&_div]:p-1">
                        <div class="border-x border-goco-dark-green">
                            Full Fibre - 300 Mbps
                        </div>
                        <div>£30.99</div>
                        <div class="border-x border-goco-dark-green">
                            £34.99
                        </div>
                        <div>£38.99</div>
                        <div class="border-x border-goco-dark-green">
                            N/A
                        </div>
                    </div>
                    <div class="grid grid-cols-5 text-center [&_div]:p-1">
                        <div class="border-x border-goco-dark-green">
                            Busiest Home Bundle - 1.6 Gbps
                        </div>
                        <div>£59.99</div>
                        <div class="border-x border-goco-dark-green">
                            £63.99
                        </div>
                        <div>£67.99</div>
                        <div class="border-x border-goco-dark-green">
                            N/A
                        </div>
                    </div>
                </div>
            </div>

            <h2>Does EE provide 12 month contract broadband?</h2>
            <p>
                Yes. EE offers
                <a href="{{ $gocoRoute('gocompare.12-month-broadband-deals') }}">12 month broadband contracts</a>
                across all packages, as well as 24 month plans. 18 month contracts are exclusively for their hybrid
                fibre package.
            </p>
            <p>
                If you’re on a hybrid tariff, you can also choose a 30-day rolling contract. And if you have a
                <a href="{{ $gocoRoute('gocompare.benefits') }}">social tariff</a>,
                a 30-day rolling contract is standard.
            </p>

            <h2>Is EE broadband available in my area?</h2>
            <p>
                EE is part of BT Group, which owns Openreach. As such, it has wide network coverage throughout the UK.
                Currently, Openreach covers around 99% of the country.
            </p>
            <p>
                BT Group owns EE and Plusnet, which means if one is available in your area, the others will likely
                be there, too.
            </p>
            <p>
                Use our <a href="{{ $gocoRoute('gocompare.best-broadband-in-my-area') }}">postcode checker</a> to see
                what broadband deals there are where you live.
            </p>

            <h2>Does EE offer broadband only deals?</h2>
            <p>
                Yes. EE offers a range of deals. So depending on what suits you best, you can choose broadband only,
                broadband and TV deals or quad-play deals.
            </p>
            <p>
                EE’s broadband only deals use either hybrid or full fibre technology, with the latter offering speeds
                of up to 1.6 Gbps and connecting to over 190 devices at once. Even with a more basic hybrid fibre
                package, you get a minimum speed guarantee of 37 Mbps (20 Mbps uploads).
            </p>
            <p>
                The most basic EE broadband only package, delivered through hybrid fibre, requires a one-off £9.99
                activation fee.
            </p>

            <h2>Is landline included in my EE broadband deal?</h2>
            <p>
                EE broadband includes Digital Home Phone, not a landline. This service offers HD calling, call protect
                and voicemail. It’s usable anywhere via your smartphone, unlike traditional wired landlines.
            </p>
            <p>
                EE aims to switch all eligible customers to Digital Home Phone at no extra cost, including calling
                features. Setup involves your Smart Hub router showing a blue light. Calls should work within 15
                minutes if your number transfers.
            </p>

            <h2>Do I get EE TV with my broadband deal?</h2>
            <p>
                When you sign up for EE broadband, you can choose to add EE TV. This is based on the Apple TV 4K
                set-top box. You get over 70 free channels, plus on-demand content from BBC iPlayer, ITV Hub and All4.
            </p>
            <p>Extra channels that you can add to an EE TV and broadband package include:</p>
            <ul>
                <li>NOW Memberships - Access Sky channels like Sky Sports, Sky Cinema, and Sky Atlantic via NOW</li>
                <li>NOW Boost - This helps improve streaming quality if you subscribe to any NOW Membership(s)</li>
                <li>Asian Mix - This lets you access selected channels with an Asian focus</li>
                <li>Paramount+</li>
                <li>TNT Sports</li>
                <li>Netflix</li>
                <li>discovery+</li>
            </ul>
            <p>
                EE offers TV set-top boxes to all customers. With this, you can stream and watch live TV without being
                tied down to any TV contract.
            </p>
            <p>
                If you want sports on your plan, you can add Sky Sports channels via a NOW TV Sports Membership, as
                well as TNT Sports via discovery+. You can also sign up for Netflix and Paramount+ through the EE TV
                Box Pro and EE TV Box Mini.
            </p>
            <p>
                Not only that, you can get six months of free Apple TV+, with access to Apple Originals, like Slow
                Horses, The Morning Show and Down Cemetery Road.
            </p>
            <p>
                EE monthly mobile customers can get Apple TV 4K included in their EE broadband packages. This is an
                exclusive deal and gives you access to Apple Music, Apple TV+, and 50GB iCloud storage or TNT Sports on
                discovery+.
            </p>

            <h3>Does it work out cheaper to bundle TV and internet?</h3>
            <p>
                Bundling your TV and internet could work out cheaper than paying for each service separately. Besides
                the convenience that comes with combining two monthly bills into one, you could also get a discounted
                rate, depending on your provider.
            </p>
            <p>Advantages to getting your TV and internet together can include:</p>
            <ul>
                <li>
                    Saving money - Bundling internet and TV typically results in lower monthly bills than paying for
                    each separate service
                </li>
                <li>
                    Simplified billing - You won’t have to worry about how much each individual service costs if
                    they’re both included as part of a convenient bundle
                </li>
                <li>
                    Additional perks - These might include streaming subscriptions, premium channel access and
                    network-exclusive offers
                </li>
            </ul>
            <p>
                Bundling TV and internet is only a good idea if your household needs it. If you live by yourself,
                the main benefit is likely to be convenience, whereas if you’re part of a big family where everyone
                has different viewing habits, you could save big on usage across various channels.
            </p>

            <h2>Pros of EE broadband</h2>
            <p>The main benefits of EE broadband include:</p>
            <p>
                <x-svg.tick-icon class="inline mr-1 align-middle text-goco-dark-green" />
                Gigabit capability - With download speeds of up to 1.6Gbps, you can enjoy data-heavy activities like
                streaming in 4K and online gaming without worrying about lag or connectivity issues
            </p>
            <p>
                <x-svg.tick-icon class="inline mr-1 align-middle text-goco-dark-green" />
                Wi-Fi enhancer modes - Game Mode, Work Mode, and Stream Mode all optimise your internet performance for
                different needs, while wireless modes 1, 2, and 3 also allow you to adjust the range and frequency of
                your connection
            </p>
            <p>
                <x-svg.tick-icon class="inline mr-1 align-middle text-goco-dark-green" />
                Inclusive perks - You can add these to your EE broadband plan. They might include entertainment
                subscriptions like Apple Music, Apple TV+, Netflix and Xbox Game Pass Ultimate
            </p>
            <p>
                <x-svg.tick-icon class="inline mr-1 align-middle text-goco-dark-green" />
                Extensive Wi-Fi hotspots - There around 150,000 free connection points with EE across the country,
                including on the London Underground
            </p>
            <p>
                <x-svg.tick-icon class="inline mr-1 align-middle text-goco-dark-green" />
                Customer service - Free 24/7 support is available anytime on the EE app or you can talk to an EE guide
                from 8am to 9pm every day
            </p>

            <h2>Cons of EE broadband</h2>
            <p>Some drawbacks of EE broadband include:</p>
            <p>
                <x-svg.cross-icon class="inline mr-1 align-middle text-red-600" />
                Cost - EE can cost more than some other providers, especially when add-ons aren’t included
            </p>
            <p>
                <x-svg.cross-icon class="inline mr-1 align-middle text-red-600" />
                Price increases - Your monthly bill will go up in April next year and the year after. So depending
                on the length of your contract and when you signed up, you could be hit with two price rises before
                your minimum term is up
            </p>
            <p>
                <x-svg.cross-icon class="inline mr-1 align-middle text-red-600" />
                Limited flexibility - 12 and 24 month contracts are the standard for all EE broadband deals, while
                18 month contracts are only available for hybrid fibre
            </p>

            <h2>How long are EE broadband contracts for?</h2>
            <p>
                If you get an EE broadband package now, your contract will be for 12 or 24 months. This is subject to
                credit checks and availability.
            </p>

            <h2>How do I switch to EE broadband?</h2>
            <p>
                With the introduction of <a href="{{ $gocoRoute('gocompare.one-touch-switch') }}">One Touch Switch</a>,
                if you’re looking to switch to EE broadband, EE will cancel your current contract for you. You won’t
                have to have that awkward conversation with your existing broadband provider.
            </p>
            <p>That said, if you have a broadband and TV package, you’ll have to cancel the TV package yourself.</p>
            <p>
                Using the EE app, you can get your broadband equipment set up at home. If you have any issues with your
                Wi-Fi, EE will provide you with a 4G Wi-Fi device until it’s fixed, although this is only for a select
                few packages.
            </p>

            <h3>Can I switch to EE broadband for free?</h3>
            <p>In some cases, you will be able to switch your broadband provider for free:</p>
            <ul>
                <li>You’re out of your minimum contract period</li>
                <li>The download speed for your broadband is lower than advertised</li>
                <li>Your broadband provider increases prices by more than it said it would when you signed up</li>
            </ul>
            <p>
                In such cases, you get 30 days from when you were told about the price rise to cancel your contract.
                You can then get out penalty-free and make the switch.
            </p>
            <p>
                In most cases, depending on your provider, you might need to pay a fee if you terminate your contract
                early. The good news is that now EE gives you up to £300 towards any early leaving charges.
            </p>

            <h3>What happens when you switch from BT to EE broadband?</h3>
            <p>
                When you switch from BT to EE broadband, your old BT service will be automatically cancelled and you’ll
                start receiving EE broadband instead. There shouldn’t be any interruption to your service, although you
                might need to return your old BT hub within 60 days to avoid having to pay a fee. Your BT broadband
                account will change to an EE account and your email address will continue to work.
            </p>
            <p>
                Although you don’t have to move from BT to EE, the company recommends doing so to get better
                connectivity.
            </p>

            <h2>How do I check my broadband speed to compare against EE?</h2>
            <p>
                To compare your broadband speed with what EE offers, use our
                <a href="{{ $gocoRoute('gocompare.speed') }}">broadband speed checker</a>
                to find out what speeds you’re currently getting. Then take a look at the speed guarantees on each of
                the EE deals above to see if you could get faster internet by switching.
            </p>

            <h2>How do I get EE broadband?</h2>
            <p>
                Use our deals table at the top of this page to compare EE broadband deals and sign up for one that
                suits you. Just follow the link through to EE’s website and complete the sign-up process. EE will then
                notify your old provider that you’re switching, so you don’t need to do anything.
            </p>
            <p>
                If you want to discuss broadband options with EE’s customer service team, you can call them on
                0800 079 5128. Existing EE customers can call 0330 123 1105.
            </p>
            <p>
                Or if you’re not ready to commit yet, use our
                <a href="{{ $gocoRoute('broadband-deals') }}">broadband comparison tool</a>
                to compare broadband deals from other providers.
            </p>

            <h3>How to set up EE broadband when moving house</h3>
            <p>
                When moving house, simply inform EE three weeks in advance. EE will arrange for your broadband to be
                set up at your new address and won’t charge you any connection or activation fees, even if an engineer
                visit is required.
            </p>

            <h3>How do I get EE Mobile broadband?</h3>
            <p>
                If you want a combined EE broadband and Mobile package, EE offers a few options to choose from. You can
                get <a href="{{ $gocoRoute('gocompare.mobile') }}">mobile broadband</a>, 4G and 5G home broadband.
            </p>
            <p>
                EE offers an excellent Wi-Fi range where you can connect over 100 devices with superfast speeds. The
                average 5G speed is 146Mbps and the average 4G speed is 40Mbps.
            </p>
            <p>This is great for remote work, streamers and online gamers.</p>
            <p>
                For students or renters who want flexible plans, EE offers 4G plans on a one-month or 18-month basis.
                You also don’t need an engineer installation. All you need to do is get plugged in and you’re connected
                straightaway.
            </p>

            <h2>What's included with an EE internet package?</h2>
            <p>
                When you sign up for an EE broadband deal, you’ll get a free Wi-Fi router included in your plan.
                Depending on which package you’ve chosen, you’ll receive either the Wi-Fi 6 Smart Hub Plus or the Smart
                Hub Pro, which offers Wi-Fi 7 support for fast full fibre speeds.
            </p>
            <p>
                On top of this, EE customers can access unlimited data on qualifying mobile deals. And some EE plans
                also come with added perks like Apple TV+.
            </p>

            <h2>FAQ</h2>
            <h3>Do EE charge any upfront costs or one-off payments?</h3>
            <p>Depending on which package you choose, EE might charge upfront costs or one-off payments.</p>
            <p>
                For instance, its hybrid fibre plan currently requires a one-off activation fee of £9.99, while other
                EE broadband deals waive this charge.
            </p>
            <p>
                You might also have to pay to upgrade any tech that isn’t faulty, like if you want a replacement
                broadband router or TV box.
            </p>
            <p>Other add-ons like extra data and international calling could also incur one-off charges.</p>

            <h3>Are EE routers included in broadband packages?</h3>
            <p>
                Yes. All EE broadband packages come with a Smart Hub Plus router as standard, apart from the Busiest
                Home Bundle that includes EE’s more advanced Smart Hub Pro.
            </p>
            <p>
                The Pro allows you to get up to 1.6G bps with your EE broadband, as well as being able to connect over
                190 devices at once.
            </p>

            <h3>How long does EE take to install?</h3>
            <p>
                EE advises that broadband installation can take up to three hours. During this time, an engineer might
                be required to work inside and outside your home. The engineer’s visit will be scheduled with you in
                advance, so you’ll know exactly when work is due to commence.
            </p>

            <h3>What is EE One?</h3>
            <p>
                EE One gives special benefits to EE customers who have both an EE broadband and an eligible EE mobile
                plan. The standout offer is the unlimited data boost for customers who pay £10 a month or more on their
                mobile plan. EE estimates that this can save you up to £20 a month, when compared to non-EE broadband
                customers.
            </p>
            <p>
                If you already pay for unlimited data on EE, you’ll still have the flexibility of a 30-day rolling
                contract, provided you’re on a SIM only plan. And you can make the most of either a data boost or a
                monthly saving if you get another plan of at least £10 a month.
            </p>

            <h3>How much does it cost to cancel EE broadband?</h3>
            <p>
                If you’re out of contract, EE won’t charge you anything to leave. Otherwise, you’ll need to pay off the
                remainder of your contract with a small deduction.
            </p>
            <p>
                For instance, if you’re on a plan currently priced at £30 per month, with three months left, EE will
                multiply those figures to get a total of £90. Then it’ll take off VAT, which leaves £75. Finally, they
                take off another 4% (for early receipt of payment), before re-adding VAT to get a final cancellation
                fee of £86.40.
            </p>
            <p>To cancel EE broadband, you can call 0800 079 0544.</p>
            <p>
                Alternatively, if you’re switching to a different provider, your new provider will contact EE directly
                on your behalf as part of the One Touch Switch process.
            </p>
            <p>
                If you cancel within 14 days of your EE broadband being activated, you won’t have to pay an exit fee,
                as you’ll still be within the cooling-off period.
            </p>

            <h3>How much is EE broadband for pensioners?</h3>
            <p>
                While EE doesn’t offer specific
                <a href="{{ $gocoRoute('gocompare.broadband-for-pensioners') }}">broadband for pensioners</a>, its
                Basics plan does serve as <a href="{{ $gocoRoute('gocompare.benefits') }}">social tariff broadband</a>
                if you receive pension credit.
            </p>
            <p>Other customers on benefits eligible for EE Basics include those successfully claiming:</p>
            <ul>
                <li>Universal Credit</li>
                <li>Employment and Support Allowance (ESA)</li>
                <li>Jobseeker’s Allowance (JSA)</li>
                <li>Income Support</li>
            </ul>
            <p>
                EE will carry out an eligibility check to see if you qualify, for which you’ll need your National
                Insurance Number. You must also pass a separate credit check.
            </p>
            <p>If successful, EE’s Basics plan gives you:</p>
            <ul>
                <li>5GB data</li>
                <li>Unlimited calls</li>
                <li>Unlimited texts</li>
                <li>25Mbps max. speeds</li>
            </ul>
            <p>
                Currently priced at £12 per month (with current increases of around £3 expected each year), EE’s Basics
                tariff puts you on a 30-day rolling contract for 12 months. You can cancel any time without paying an
                early exit fee.
            </p>
            <p>
                EE will run a fresh eligibility check every 12 months to determine whether you still qualify for this
                package.
            </p>

            <h3>What will happen to my landline number if I get an EE broadband deal?</h3>
            <p>
                Since EE does not provide broadband deals with landline, no call service is included in any packages.
                This means you won’t have any dial tone and you can’t make or receive calls. It includes calling any
                emergency services.
            </p>
            <p>
                Plus, you will lose access to your home phone number and it will no longer work. You won’t be able to
                get your number back, and will have to get a new one instead.
            </p>
            <p>Any personal alarms or other services connected to your home phone number will not work either.</p>

            <hr class="py-2">

            <p>Page last updated: {{ $pageLastUpdated }}</p>

            <p class="text-sm">
                [1] As of {{ now()->format('jS F Y') }}, there
                {{ $supplierCount === 1 ? 'is' : 'are' }}
                {{ $supplierCount }} active broadband
                {{ $supplierCount === 1 ? 'provider' : 'providers' }}
                on the panel at Go.Compare
            </p>
        </div>
    </section>
@endsection
