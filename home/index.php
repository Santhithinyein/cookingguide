<?php
    include('../inc/header.inc.php');
?>
<div class="home_div">
    <div class="with_background_child_element">
        <div class="home_menu">
            <div class="menu">
                <div class="float-right menu_detail">
                    <div class="category_anchor">
                        <div class="myDIV"> 
                            <a id="change_white" href="../home" class="category active">Home</a>
                        </div>
                    </div>
                    <div class="category_anchor" style="margin-left: 18px;">
                        <div class="myDIV">
                            <a id="change_white" href="../authorization" class="category">Admin</a>
                        </div>
                    </div>
                    <div class="category_anchor" style="margin-left: 18px;">
                        <div class="myDIV">
                            <a id="change_white" href="../vegetables" class="category">User</a>
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <a href="../inc/category.inc.php">
                        <button class="menu_button"></button>
                    </a>
                </div>
            </div>
        </div>
        <div class="parent_video">
            <video width="100%" height="150" id="vid" controls="false" autoplay="autoplay" loop="true" muted defaultmuted playsinline >
                <source src="bg.mp4" type="video/mp4">
                <source src="movie.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </div>
        <center>
            <div class="message">
                <P>
                    Would you like to cook at home for the holidays?
                    Would you like to cook with your friends?
                    There is a cooking guide on the side to help you cook whenever you like.
                    Easy access to recipes for a variety of dishes.
                </p>
                <p>
                    အားလပ်ရက်မို့လို့ အိမ်မှာဟင်းချက်စားမလား
                    သူငယ်ချင်းတွေစုပီး ဟင်းချက်စားမလား
                    ကြိုက်တဲ့အချိန်ချက်စား နိုင်အောင်ဘေးကနေအထောက်အကူပြုပေးမည့်  Cooking  Guide ရှိပါတယ်နော်။
                    ဟင်းအမျိုးပေါင်းများစွာရဲ့ချက်နည်းတွေကို ဝင်ရောက်ပြီးလွယ်ကူစွာလေ့လာလိုက်ပါရှင်။
                </p>
            </div>
        </center>
    </div>
</div>
<?php
    include('../inc/footer.inc.php');
?>
