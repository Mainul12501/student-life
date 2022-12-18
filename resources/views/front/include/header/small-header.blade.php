<!-- HEADER STRIP -->
<div class="headtoppart bg-danger clearfix">
    <div class="headerwp clearfix">

        <!-- Infotmation -->
        <div class="headertopleft">
            <div class="header-info clearfix">
                <!--<span class="txt-400"><i class="fas fa-map-marker-alt"></i>Location in BD</span>-->
                <?php
                $currentDate = date("l, j F, Y");
                $engDATE = array('1','2','3','4','5','6','7','8','9','0','January','February','March','April',
                    'May','June','July','August','September','October','November','December','Saturday','Sunday',
                    'Monday','Tuesday','Wednesday','Thursday','Friday');
                $bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে',
                    'জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
বুধবার','বৃহস্পতিবার','শুক্রবার'
                );
                $convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);
//                echo "$convertedDATE";
                ?>
                <span class="hover-black"  id="dateBangla">{{ $convertedDATE }}</span>
                <a class="hover-black" style="text-decoration: none;">| {{ date('d-m-yy') }}</a>
            </div>
        </div>

        <!-- Contacts -->
        <div class="headertopright header-contacts">
            <!--<a href="tel:" class="callusbtn txt-400"><i class="fas fa-phone"></i>+8800000|</a>-->
            <!--<a href="" class="txt-400"><i class="far fa-envelope-open"></i>hello@test.com</a>-->
            <a href="javascript:void(0)" class="txt-400 px-1"><i class="fab fa-facebook-square"></i></a>
            <a href="javascript:void(0)" class="txt-400 px-1"><i class="fab fa-twitter"></i></a>
            <a href="javascript:void(0)" class="txt-400 px-1"><i class="fab fa-youtube"></i></a>
            <a href="javascript:void(0)" class="txt-400 px-1"><i class="fab fa-skype"></i></a>
        </div>

    </div>
</div>	<!-- END HEADER STRIP -->
