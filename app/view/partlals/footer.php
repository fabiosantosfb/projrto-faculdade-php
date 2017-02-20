</div>
</div>
<script src="app/assets/js/jquery-3.1.1-min.js" charset="utf-8"></script>
<script type="text/javascript">
document.getElementById("nav-toggle").addEventListener ("click", toggleNav);
function toggleNav() {
    var nav = document.getElementById("nav-menu");
    var className = nav.getAttribute("class");
    if(className == "nav-right nav-menu") {
        nav.className = "nav-right nav-menu is-active";
    } else {
        nav.className = "nav-right nav-menu";
    }
}
</script>
<p>&nbsp;</p>
<footer class="footer">
    <div class="container is-fluid">
        <div class="content">
            <p class="">
                <strong>NTI Procon/PB</strong><br>
                <a href="http://www.procon.pb.gov.br" target="_blank">www.procon.pb.gov.br</a>
            </p>
        </div>
    </div>
</footer>
</body>
</html>
