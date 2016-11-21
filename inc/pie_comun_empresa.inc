<div id="pie">
   <div class="container">
       <div class="row">
          <div class="col-xs-4">
                <p id="copyright"><span class="glyphicon glyphicon-copyright-mark"></span> 2016 Universidad Euro Hispanoamericana</p>
          </div>
          <div class="col-xs-4">
            <a style="cursor: pointer" id="ir-inicio">Ir al inicio</a>
          </div>
           <div id="pie-redes" class="col-xs-4">
              <div class="row">
                <div class="col-xs-2"></div>
                <div class="col-xs-2"></div>
                <div class="col-xs-2"><img class="img-responsive" src="../../img/fb.png"></div>
                <div class="col-xs-2"><img class="img-responsive" src="../../img/twi.png"></div>
                <div class="col-xs-2"><img class="img-responsive" src="../../img/ins.png"></div>
                <div class="col-xs-2"><img class="img-responsive" src="../../img/gp.png"></div>
              </div>
            </div>
        </div>
       </div>
   </div>
</div>
 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

        <script src="../../js/moment.min.js" ></script>
        <script src="../../js/transition.js" ></script>
        <script src="../../js/collapse.js" ></script> 
        
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

         <script src="../../js/bootstrap-datetimepicker.min.js" ></script>

        <!-- Scroll reveal -->
        <script src="https://cdn.jsdelivr.net/scrollreveal.js/3.3.1/scrollreveal.min.js"></script>
        
        <script src="../../js/main-empresa.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
          <script type="text/javascript">
            $(function () {
                $('#datetimepickerinicio').datetimepicker({
                    viewMode: 'days',
                    format: 'DD/MM/YYYY'
                });
                $('#datetimepickercaducidad').datetimepicker({
                   viewMode: 'days',
                    format: 'DD/MM/YYYY'
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
    </body>
</html>