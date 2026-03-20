@extends('gocompare.templates.app')

@section('content')
<section class="standard-page">
    <div>
        <h2>Compare Broadband and landline deals</h2>
        <p>
            You no longer need a landline to get broadband. But if you want a home phone for other reasons,
            getting a combined broadband and landline deal is usually cheaper than buying both separately.
        </p>

        <h2>Reasons to have a home phone</h2>
        <p>
            Data released by
            <a
                href="https://www.ofcom.org.uk/siteassets/resources/documents/research-and-data/data/statistics/2025/2025-technology-tracker/2025-technology-tracker---core-data-tables.pdf?v=402547"
                target="_blank"
                rel="noreferrer"
            >Ofcom</a>
            in 2025 shows that people with landline phones in the UK are in the minority. Only 40% of us have a phone
            plugged in at home now. There are a few reasons why you might still choose to be one of them, though. This
            could be due to:
        </p>
        <ul>
            <li>
                <span class="font-semibold">Poor mobile signal</span> - If your home is in a “not-spot” for mobile
                coverage, you’ll need a landline to make sure people can get hold of you
            </li>
            <li>
                <span class="font-semibold">Easy to use</span> -  Perhaps you live with a family member who prefers a
                landline because they’re more familiar with older technology or find the buttons easier to press
            </li>
            <li>
                <span class="font-semibold">Business trust</span> - If you run a small business from home, having a
                local phone number can make potential customers see you as more trustworthy
            </li>
            <li>
                <span class="font-semibold">Wellbeing and focus</span> -  If you’re trying to limit your use of
                screens, having a landline that your loved ones can ring in an emergency means you can switch off
                your mobile off to relax or concentrate on work without worrying
            </li>
        </ul>

        <h2>What are the pros and cons of a phone and broadband deal?</h2>
        <p>
            What are the advantages and disadvantages of a deal that bundles your broadband with a landline phone?
        </p>
        <div class="overflow-x-auto">
            <div
                class="border-2 border-goco-dark-green mt-2 min-w-[1000px] lg:w-3/5 [&>div]:border-b
                    [&>div]:border-goco-dark-green"
            >
                <div class="grid grid-cols-2 text-center [&_div]:bg-gray-200 [&_div]:p-1 font-semibold">
                    <div>
                        Pros
                    </div>
                    <div class="border-x border-goco-dark-green">
                        Cons
                    </div>
                </div>
                <div class="grid grid-cols-2 [&_div]:p-1">
                    <div>
                        <p>
                            ✅ It’s easier to get landline rental bundled in with your broadband, rather than as a
                            separate contract
                        </p>
                        <p>✅ It’s usually cheaper than purchasing them separately</p>
                        <p>
                            ✅ Having the same provider for both your landline and broadband makes it simpler as you
                            only have one company to deal with
                        </p>
                    </div>
                    <div class="border-x border-goco-dark-green">
                        <p>
                            ❌ There’s a smaller range of phone and broadband deals to choose from, compared to
                            broadband-only deals
                        </p>
                        <p>❌ It can be an unnecessary cost if you only use your mobile phone for calls</p>
                        <p>❌ You might get more spam calls</p>
                    </div>
                </div>
            </div>
        </div>

        <h2>The shift to digital landlines</h2>
        <p>
            The UK is getting rid of the telephone wiring used by old-style landlines. Instead, every landline user
            will be upgraded to a digital phone line by the end of  January 2027 according to
            <a
                href="https://www.bt.com/about/all-ip"
                target="_blank"
                rel="noreferrer"
            >BT</a>,
            the largest landline provider in the UK.
        </p>
        <p>
            This means that if you’re switching providers, it’s no longer possible to sign up for a new analogue phone
            contract. You’ll be moved to the Digital Voice service, which uses your broadband connection to make calls.
        </p>
        <p>
            You don’t need to do anything differently and most people won’t notice any change. If you have full fibre
            broadband plus a landline phone, chances are you’re already using Digital Voice. You should be notified
            before you’re switched over and your existing home phone should still work on the new system. If not, you
            can order an adaptor for free if you’re with
            <a
                href="https://www.bt.com/broadband/digital-voice"
                target="_blank"
                rel="noreferrer"
            >BT</a>.
        </p>


        <h2>Does all broadband come with a landline?</h2>
        <p>No, it’s possible to find broadband packages without a landline.</p>
        <p>
            This is the case for
            <a href="{{ $gocoRoute('gocompare.fibre-optic') }}">full fibre broadband</a>,
            also known as fibre to the premises (FTTP), which doesn’t use copper phone lines to reach your property.
            It’s currently available for 74% of UK homes, according to
            <a
                href="https://www.ofcom.org.uk/phones-and-broadband/coverage-and-speeds/connected-nations-update-spring-2025"
                target="_blank"
                rel="noreferrer"
            >Ofcom</a>.
        </p>
        <p>
            Although full fibre broadband often gives you higher download speeds and a reliable connection, it can be
            more expensive. So it’s worth weighing up the pros and cons.
        </p>
        <p>Broadband providers that offer full fibre broadband include:</p>
        <ul>
            <li>
                <a href="{{ $gocoRoute('gocompare.bt-deals') }}">BT</a>
            </li>
            <li>
                <a href="{{ $gocoRoute('gocompare.plusnet-broadband') }}">Plusnet</a>
            </li>
            <li>
                <a href="{{ $gocoRoute('gocompare.virgin-media') }}">Virgin</a>
            </li>
            <li>
                <a href="{{ $gocoRoute('gocompare.hyperoptic') }}">Hyperoptic</a>
            </li>
            <li>
                <a href="{{ $gocoRoute('gocompare.community-fibre') }}">Community Fibre</a>
            </li>
        </ul>
        <p>
            Both BT and Plusnet use the Openreach network to give you access to full fibre broadband, unlike Virgin,
            Hyperoptic and Community Fibre, which have built their own networks.
        </p>
        <p>
            It’s still possible to get a home phone with full fibre broadband, as providers can use Digital Voice
            instead of your old telephone lines.
        </p>
        <p>
            Even for fibre to the cabinet (FTTC) broadband that uses telephone lines to reach your home, it’s not
            necessary to actually have a landline phone installed. Providers might include a landline connection for
            free but it’s up to you if you use it.
        </p>

        <h2>How to find the best broadband and home phone deal for me</h2>
        <p>The options are fairly limited so it shouldn’t take long to compare:</p>
        <ul>
            <li>
                Monthly price - How much you’ll pay each month. You’ll want to look at the overall contract cost, too
            </li>
            <li>Call costs - This is the cost of any calls that aren’t included in your plan</li>
            <li>
                International calls - One of the main benefits of getting a landline is you can get cheap or inclusive
                international calls
            </li>
            <li>
                Broadband speed - Check out our
                <a href="{{ $gocoRoute('gocompare.what-broadband-speed-do-i-need') }}">bandwidth calculator</a>
                to find out what speed you actually need
            </li>
            <li>Contract length - Typically this will be 24 months</li>
        </ul>

        <h2>How do combined broadband and phone deals actually work?</h2>
        <p>
            Deals that combine broadband and a landline work by packaging your internet service and home phone into one
            monthly bill from the same provider. You’ll have a set monthly cost for the broadband part of your deal and
            you’ll have to pay extra to make calls on your landline unless you find a plan that includes free calls.
        </p>
        <p>
            You can use the table at the top of this page to compare broadband and landline deals by price, broadband
            speed and any offers on landline calls. It’s also a good idea to do your research by  checking customer
            reviews.
        </p>
        <p>
            You’ll usually be required to pass a credit check and once you’ve been approved, you can select a start
            date to switch to the new provider.
        </p>
        <p>
            It’s possible that you’ll need an engineer visit to set up your broadband but your new provider will
            arrange this with you if that’s the case. Digital phone lines are now used instead of analogue technology.
            This means that landline calls will be delivered through your broadband connection.
        </p>
        <p>
            It’s usually possible to keep the same home phone number when you’re switching. You’ll just need to let
            your new provider know that you want to port your number.
        </p>

        <h3>Can I have broadband and a landline with different providers?</h3>
        <p>Yes, it’s possible to have your broadband and landline supplied by different providers.</p>
        <p>
            This could be the case if you have broadband with a provider that doesn’t offer the option of a home phone
            and you still want a landline in your home.
        </p>
        <p>
            If you’re looking for a new deal, selecting a combined broadband and home phone package could help you
            access cheaper deals. And it can make life a bit easier for you, as you only have one provider to deal
            with.
        </p>
        <p>
            You can compare combined broadband and home phone deals at the top of this page. Please note, we don’t
            currently offer the option to compare standalone home phone options.
        </p>

        <h2>Should I go for a combined broadband and phone deal?</h2>
        <p>
            If you need a landline, getting your phone service combined with your broadband is usually the cheapest
            and simplest option.
        </p>
        <p>
            If you don’t need a landline, there’s no need for a broadband deal with a phone plan attached and there’s
            no advantage to this.
        </p>
        <p>
            Only a small number of broadband providers offer deals that include a landline these days, so your choice
            is limited.
        </p>
        <p>If you put your postcode into our address finder above, we’ll show you deals that are:</p>
        <ul>
            <li>Available for your address</li>
            <li>Available right now</li>
        </ul>
        <p>Then you can compare the options based on price, broadband speed and whatever else is important to you.</p>

        <h3>Do broadband and landline deals include line rental?</h3>
        <p>
            Yes,
            <a
                href="https://www.ofcom.org.uk/phones-and-broadband/telecoms-infrastructure/what-is-line-rental-why-do-i-have-to-pay-it"
                target="_blank"
                rel="noreferrer"
            >Ofcom</a>
            rules mean that providers have to include all costs in the advertised price for a deal.
        </p>
        <p>
            Line rental is an essential cost because it covers maintenance for the line that supplies your home with
            the broadband and phone service. It might show up separately on your bill, but not in the price you see in
            the results on a comparison website like ours.
        </p>

        <h2>What is the cheapest way to have a landline?</h2>
        <p>
            It’s usually cheaper to get your landline bundled in with a broadband package than purchasing them
            separately. It will also be more convenient.
        </p>
        <p>You’ll have limited options if you only want landline rental, as it’s not widely available anymore.</p>

        <h2>How do I switch home phone providers?</h2>
        <p>
            Find a new deal by comparing online. Then give your details to the new provider and let them handle the
            switch.
        </p>
        <p>
            It’s really that simple. Thanks to
            <a href="{{ $gocoRoute('gocompare.one-touch-switch') }}">One Touch Switch</a>,
            you don’t need to tell your old provider that you’re leaving and your phone should keep working throughout
            the switchover.
        </p>

        <h2>How and when can I switch my broadband?</h2>
        <p>
            Although you can
            <a href="{{ $gocoRoute('gocompare.switching-provider') }}">switch your broadband</a>
            and home phone provider whenever you like, it’s important to consider any exit fees.
        </p>
        <p>
            These can be really expensive, especially if you’re early on in your contract. Typically, you’ll need to
            pay for any remaining months before you can switch. It might not be worth it, so do the calculations to
            check.
        </p>
        <p>
            If you’re approaching the end of your contract or it has already ended, you can switch to another deal
            easily. All you need to do is compare broadband and home phone options, then choose the one that suits your
            needs and budget. With One Touch Switch, you can then sit back and relax while your new provider sorts
            everything out.
        </p>
        <p>
            You’ll receive a switching date and you might need an engineer if your new provider uses a different
            network from your previous one or you’re upgrading from FTTC to full fibre broadband. But your new provider
            will arrange that with you if you need it.
        </p>

        <h2>FAQs</h2>
        <h3>Can I get any bundles, freebies or cashback?</h3>
        <p>
            Yes, it’s possible to bundle your broadband with a home phone and
            <a href="{{ $gocoRoute('gocompare.digital-television') }}">TV package</a>.
            And there are free gifts and cashback available on a number of deals. They can change regularly, so you’ll
            need to compare packages to see what options are currently on offer to you.
        </p>
        <p>
            Freebies can include gift cards, vouchers, gadgets or even a router. But don’t be enticed by a free gift if
            it doesn’t give you the right broadband and home phone deal for you.
        </p>

        <h3>Broadband without a landline</h3>
        <p>Many well-known providers offer broadband without a landline, as do some smaller companies.</p>
        <p>
            <a href="{{ $gocoRoute('gocompare.no-landline') }}">Some broadband deals without a landline</a>
            might work out to be more expensive than ones bundled with alandline, even if you never make calls. So
            always compare to get a great deal.
        </p>
        <p>
            <a href="{{ $gocoRoute('gocompare.satellite-broadband') }}">Satellite</a>
            or
            <a href="{{ $gocoRoute('gocompare.mobile') }}">mobile broadband</a>
            don’t need a landline either. They can be a good option if you live in a rural area.
        </p>

        <h3>Are there unlimited phone calls and broadband packages?</h3>
        <p>
            Yes, providers including BT and
            <a href="{{ $gocoRoute('gocompare.sky') }}">Sky Broadband</a>
            offer unlimited phone calls on certain broadband packages. Others offer unlimited weekend or evening
            calls or a cheaper rate during these times.
        </p>
        <p>To find out what is available for your home, you’ll need to compare packages.</p>

        <h3>Are there any add-ons available?</h3>
        <p>
            You might be able to bundle a TV package in with your broadband and landline deal. This could give you
            access to channels like Sky Sports and streaming services including Netflix and Disney+.
        </p>
        <p>
            Some providers also allow you to upgrade the router you’ll receive as part of the package, which could
            boost your broadband speed and make browsing safer.
        </p>

        <h3>Will I be credit checked?</h3>
        <p>
            Yes, signing up for a new broadband and phone deal usually involves a credit check. This is because the
            provider wants evidence that you can pay the monthly bills before supplying the service to your home.
        </p>
        <p>
            It is possible to get
            <a href="{{ $gocoRoute('gocompare.no-credit-check') }}">broadband with no credit check</a>.
            At the time of writing, all the deals that include landline phone service on our website involve a
            credit check.
        </p>

        <h3>What's the best TV, broadband and phone package for pensioners?</h3>
        <p>
            There aren’t any specific packages for pensioners. That’s why it’s so important to compare options and get
            the TV channels and streaming services you want, as well as broadband with adequate speed for your internet
            usage and a call package that suits. Using the same provider for all of them can make it easier to manage,
            too.
        </p>
        <p>
            Older and vulnerable customers of
            <a
                href="https://news.virginmediao2.co.uk/vm-archive/virgin-media-gives-older-and-vulnerable-landline-customers-free-calls/"
                target="_blank"
                rel="noreferrer"
            >Virgin Media</a>
            can add its Talk Protected plan to receive unlimited free calls to UK landlines and mobiles.
        </p>
        <p>
            If you receive Pension Credit (among other types of benefits), you might qualify for a
            <a href="{{ $gocoRoute('gocompare.benefits') }}">social broadband tariff</a>.
            This gives you access to more basic broadband and home phone deals for a low price.
        </p>
        <p>
            For example,
            <a
                href="https://www.bt.com/broadband/home-essentials"
                target="_blank"
                rel="noreferrer"
            >BT Home Essentials</a>
            offers a fibre broadband connection on a 12-month contract with the option to add a home phone plan.
        </p>
        <p>
            <a
                href="https://www.sky.com/help/articles/sky-social-tariff"
                target="_blank"
                rel="noreferrer"
            >Sky Broadband Basics</a>
            has part or full fibre broadband options, as well as Sky Pay As You Talk, so you only pay for the calls you
            make on your home phone.
        </p>

        <hr class="py-2" />

        <p class="text-sm sm:text-base font-body">Page last updated {{ $pageLastUpdated }}</p>

        <x-title-and-author-anchor
            :title="$title"
            url="https://www.gocompare.com/about/our-team/kate-griffin/"
            author="Kate Griffin"
            reviewBy="Catherine Hiley"
        />

        <p>
            [1] <x-supplier-count-reference :supplierCount="$supplierCount" />
        </p>
    </div>
</section>
@endsection
