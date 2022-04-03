
        </div>
    </div>
    <script src="{{asset('/')}}assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}assets/js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('/')}}admin-assets/js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}assets/js/sweetalert.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker link code codesample fullscreen',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify| numlist bullist | outdent indent | link | code | codesample | fullscreen'

    });
    </script>
</body>

</html>