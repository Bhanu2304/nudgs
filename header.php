<div class="header">
    <div class="logo">nudgs<span class="outline">ai</span></div>
    <div id="user_icon">
        <span style="font-size: 20px;font-weight: bold;display: flex;align-items: center;justify-content: space-evenly;">S</span>
        <div class="user_icon_menu" style="width: 125px;float: inline-end;padding-top: 10px; display:none;color:#777;    font-size: 14px;">
            <div class="administrative"  onclick="admin_page_redirect()">
                <span id="administrative" style="">Administrative</span>
            </div>
            <div class="logout" onclick="logout()" style="">
                <span id="logout" style="">Logout</span>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    function logout() {
        window.location.href = "logout.php";
    }
    function admin_page_redirect() {
        window.open("admin/index.html", "_blank");
    }

    $(document).ready(function() {

    });
</script>