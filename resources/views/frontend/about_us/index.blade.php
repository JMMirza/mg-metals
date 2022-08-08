@extends('frontend.layouts.master')

@section('content')
    @include('frontend.about_us.header')

    <section class="page-section" id="about">
        <div class="container relative">
            <h2 class="section-title font-alt mb-50 mt-40 mb-sm-40">WHO WE ARE?</h2>
            <div class="section-text mb-60 mb-sm-40">
                <div class="row">
                    <div class="col-sm-6 " >
                        <p style="color:#254345">We are one of the few gold refiners in Hong Kong approved by CGSE. At present, only members of the CGSE can apply to become an accredited manufacturer, as the CGSE has very strict qualifications for its accredited manufacturers of the sole physical gold and silver exchange recognized in Hong Kong.</p>
                        <p style="color:#254345" class="mb-0">We have rich experience in the precious metals industry. In the past, we served investors and provided financing and advisory solutions to mining producers to help them optimize production processes and bolster the strength of the balance sheets.</p>
                        <p style="color:#254345" >Through close business ties with mining producers, our investment team is able to provide customers with more affordable and fine-quality solid gold products.</p>
                    </div>
                    <div class="col-sm-6 pl-2">
                        <p style="color:#254345">We embrace future trends in real-gold investment through integrations and use of technology in finance to provide retail investors with convenient, low-cost and high-quality gold investment solutions.</p>
                        <p style="color:#254345">Combined with the investments such as real estate and other projects managed under MG Group (our parent company), the Group’s combined portfolio of experience in operations management, property investment, leasing, financial investment services, and consultancy will definitely help customers achieve "a windfall for a great life".</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container relative mt-40">
            <h2 class="section-title font-alt mb-50 mt-50 mb-sm-40">OUR STORY</h2>
            <div class="section-text mb-50 mt-40 mb-sm-40">
                <div class="row">
                    <div class="col-sm-6 " >
                        <p style="color:#254345">MG Group was established in 2001. Within 10 years, our company has developed into a diversified business conglomerate wide range of businesses from a real estate investment company.</p>
                        <p style="color:#254345">Our core businesses include a variety of financial services, real estate, entertainment, publishing, arts and cultures, education and training, multimedia and environmental protection. As a portfolio company of MG Metals, Marigold International Bullion Dealers Limited (A member of The Chinese Gold and Silver Exchange Society, Hong Kong (CGSE)* and Gold Bullion Group Member**, License number: 023) was established in 2007. We officially became an authorized precious metal dealer after obtaining membership license in 2008.</p>
                    </div>
                    <div class="col-sm-6 pl-2">
                        <p style="color:#254345">As of January 1, 2022, there are 30 members of The Gold and Silver Exchange Society (CGSE) who hold gold group membership licenses. Only 15 are qualified as gold manufacturers, including Marigold International Bullion Dealers Limited, with the license to mint gold and silver bars of various fines and weights.</p>
                        <p style="color:#254345">The gold bars minted are stamped with the official verification seal and archive number of The Chinese Gold and Silver Exchange as our bullion meet the manufacture and accreditation standards in terms of fineness and weight, which can then be used for approved delivery and settlement among members of the exchange.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container relative mt-40">
            <div class="section-text mb-60 mb-sm-40">
                <div class="row">
                    <div class="col-sm-6 " >
                        <h2 class="section-title font-alt mb-50 mt-30 ">OUR HISTORY</h2>
                        <p style="color:#254345">2001 – MG Group was established</p>
                        <p style="color:#254345">2007 – Established Marigold International Bullion Dealers Limited, which acquired RNA Holdings Limited (formerly a company listed on the Hong Kong Stock Exchange) and its respective licenses as a gold and silver market trading operator as well as a Gold Group member</p>
                        <p style="color:#254345">2008 – Obtained approval for the gold and silver trade license to operate as an authorized precious metal dealer</p>
                    </div>
                    <div class="col-sm-6 pl-2">
                        <h2 class="section-title font-alt mb-50 mt-30 ">MILESTONES</h2>
                        <div class="d-flex">
                            <img src="{{ asset('frontend/images/milestone.png') }}"  style="height: 26px;margin-right: 10px;" class="mr-1" alt="logo">
                            <p style="color:#254345">Member of The Chinese Gold and Silver Exchange Society: Can operate precious metal spot, leveraged margin trading or accept global brokerage partner business in Hong Kong</p>
                        </div>
                        <div class="d-flex">
                            <img src="{{ asset('frontend/images/milestone.png') }}" style="height: 26px;margin-right: 10px;" class="mr-1" alt="logo">
                            <p style="color:#254345">Approved Gold Bullion Group member (referred to as "Gold Group members"): have the right to license gold casting. Since April 1, 1946, members have been restricted from joining, and members can apply for approval to become "Approved Gold Refiners".</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
