</div> <!-- content row//-->
</div> <!-- content maindiv//-->


<!-- footer-->

<footer class="bg-light text-center border-top">
    <div class="container p-4 pb-0">
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-primary btn-floating m-1 shadow" style="background-color: #3b5998; padding: 6px 15px;"
            href="https://www.facebook.com/consoldes.tech" role="button" target="_blank" ><i class="fa fa-facebook"></i></a>

            <!-- Twitter -->
            <a class="btn btn-primary btn-floating m-1 shadow" style="background-color: #55acee;"
            href="https://twitter.com/consoldes" role="button" target="_blank" ><i class="fa fa-twitter"></i></a>

            <!-- Google -->
            <a class="btn btn-primary btn-floating m-1 shadow" style="background-color: #dd4b39;"
            href="https://www.youtube.com/c/Consoldes" role="button" target="_blank" ><i class="fa fa-youtube-play" aria-hidden="true"></i></a>

            <!-- Instagram -->
            <a class="btn btn-primary btn-floating m-1 shadow" style="background-color: #ac2bac;"
            href="https://www.instagram.com/consoldes.tech/" role="button" target="_blank" ><i class="fa fa-instagram"></i></a>

            <!-- Linkedin -->
            <a class="btn btn-primary btn-floating m-1 shadow" style="background-color: #0082ca;"
            href="https://www.linkedin.com/company/consoldes/" role="button" target="_blank" ><i class="fa fa-linkedin"></i></a>
      
        </section>


        <div class="col-md-12">
            <i class="fa fa-envelope-o text-secondary" aria-hidden="true"></i>
            <span class="text-secondary" style="font-family: Poppins, sans-serif;">csdinfo@consoldes.tech</span>
        </div>

    </div>

    <div class="text-center p-3 bg-light">
        <span class="text-secondary"> © {{date("Y")}} Powered by: </span><a href="{{route('home')}}" class="footer-link">Consoldes</a>
    </div>

</footer>


<!-- footer //-->


</div>
<div>
</div>

<!-- BACK TO TAP -->

    <a href="#" class="bck" style="margin-bottom: 35px; border-radius: 5px; width: 40px; background: rgba(0,0,0,.4); "></a>
    <script src="{{asset('/')}}assets/js/jquery.back-to-top.js"></script>

    <script>
        $(function(){
          $('.bck').backToTop({
                  iconName : 'fa fa-arrow-up',
                  fxName : 'rightToLeft'
            });
        });
    </script>
 
<!-- BACK TO TAP //--> 

</body>

</html>