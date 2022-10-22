@extends('layouts.front.app')
@section('extends')
<!-- Page top Section -->
<section class="page-top-section set-bg spad" data-setbg="img/garrett-butler-UrJ-fn2iRUM-unsplash.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 m-auto text-white">
                <h2>Success Stories</h2>
                <p>Here we keep open minds. There is no one type or way in our diverse community. Come as you are!</p>
            </div>
        </div>
    </div>
</section>
<!-- Page top Section end -->
<!--  hero Section  -->
<section class="classes-section spad">
    <div class="container">
        <div class="section-title text-center">
            <h2>#WHATEVER YOUR GOALS</h2>
            <h3><p	style="font-size: large;font-family:serif">We’re here to help</p></h3>
        </div>
        <div class="row">
            <div class="ss1 col-lg-6">
                <ul>
                    <li>World Gym is a place where real people workout.</li>
                    <li>Nobody is perfect, but we all strive to be better.</li>
                    <li>If you need a little extra help, just ask.</li>
                </ul>
            </div>
            <div class=" ss2 col-lg-6">
                <ul>
                    <li>We specialize in making your fitness goals become your fitness truth.</li>
                    <li>Our members inspire us to achieve greatness daily.</li>
                    <li>Their stories can inspire you too.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--  hero Section end -->

<!-- About Section -->
<section class="classes-section spad">
    <div class="container">
        <div class="section-title text-center">
            <h2>#Gym - #Heros</h2>
            <h3><p	style="font-size: large;font-family:serif">Trainers tell us about their experiences in the gym</p></h3>
        </div>
        <div  class="row">
            {{-- col --}}
            <div  class="col-lg-6 spad1">
            <img src="img/group-training-people-biking-gym-exercising-legs-doing-cardio-workout-cycling-bikes-82772333.jpg"/>
            </div>
            {{-- col --}}
        <div class="col-lg-6 spad1"  style="background-color: rgb(248, 250, 255)">
                <div class="ai-text">
                    <h3><p style="text-align: center;margin: 100px;font-size: large">“WORLD GYM HAS AN OLD SCHOOL, NO EXCUSES, THROW-SOME-IRON-AROUND-THE-GYM FEEL TO IT. WALK IN TO DO SOME WORK AND GET IT DONE, RINSE AND REPEAT."</p></h3>
                </div>
            </div>
            {{-- row --}}
            </div>

            <div  class="row">
            {{-- col --}}
            <div  class="col-lg-6 spad1"  style="background-color: rgb(248, 250, 255)">
                <div class="ai-text">
                    <h3><p style="text-align: center;margin:100px;font-size: large">“MY WORLD GYM IS A FAMILY THAT ENCOURAGES, LIFTS UP, TEACHES EACH OTHER AND IS ALWAYS WELCOMING NEW MEMBERS TO THE FAMILY.”</p></h3>
                    </div>
            </div>
            {{-- col --}}
                <div class="col-lg-6 spad1" >
                    <img src="img/training-828715_1920.jpg"/>
                </div>
            {{-- row --}}
                    </div>

                </div>
        </div>
</section>
<!-- About Section end -->

<section    class="classes-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h2>#REAL PEOPLE - #REAL RESULTS</h2>
            </div>
            <div    class="row">
                <div class="ss5 col-lg-4">
                    <img src="img/RealPeopleResultsImage4.jpg" alt="NINO CONNELL, WORLD GYM MARCONI, AUSTRALIA">
                    <p>"Don't give up!  Training outcomes do not come overnight.
                  It is a process that takes time and patience, whether it's cardio or weightlifting."</p>
                    <h3>NINO CONNELL, WORLD GYM MARCONI, AUSTRALIA</h3>
                </div>
                <div class="ss5 col-lg-4">
                    <img src="img/RealPeopleResultsImage2.jpg" alt="CIARIZE AURELLADO, WORLD GYM SCARBOROUGH, CANADA">
                    <p>"We all have to start somewhere.  It takes patience, time and consistency.
                     To get where we want to go, we have to make the decision to start."</p>
                     <h3>CIARIZE AURELLADO, WORLD GYM SCARBOROUGH, CANADA</h3>
                </div>
                <div class="ss5 col-lg-4">
                    <img src="img/RealPeopleResultsImage1.jpg" alt="HENRIQUE AZEVEDO, WORLD GYM FLORIANÓPOLIS, BRAZIL">
                    <p>"Instructors are attentive,
                 and they all try to fulfill athletes; unique needs, achieving better and faster results."</p>
                        <h3>HENRIQUE AZEVEDO, WORLD GYM FLORIANÓPOLIS, BRAZIL</h3>
                </div>
            </div>
        </div>
</section>
@endsection
