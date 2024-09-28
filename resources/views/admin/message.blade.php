<!-- 
@if (session()->has('error'))

<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> Loi roi!</h4> {{ session()->get('error') }}

</div>
@endif

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> OK!</h4> {{ session()->get('success') }}

</div>
@endif -->

<style>
    .alert {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
        width: 300px;
        opacity: 0.9;
        transition: opacity 0.3s ease-out, right 0.3s ease-out;
    }

    .alert-dismissible .close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #fff;
    }

    .alert.hidden {
        right: -400px;
        opacity: 0;
    }
    .loading-bar {
    position: fixed;
    top: 0;
    left: 0;
    width: 0%;
    height: 4px;
    background-color: #3498db; 
    z-index: 1100;
    transition: width 0.3s ease;
}

.loading-bar.active {
    width: 100%;
}

</style>

@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> Lỗi rồi!</h4> 
    {{ session()->get('error') }}
</div>
<div id="loadingBar" class="loading-bar"></div>

@endif

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> OK!</h4> 
    {{ session()->get('success') }}
</div>
@endif

<script>
    // Function shot loading
function showLoadingBar() {
    var loadingBar = document.getElementById('loadingBar');
    loadingBar.classList.add('active');
}

// Function thoi gian delay loading
function hideLoadingBar() {
    var loadingBar = document.getElementById('loadingBar');
    setTimeout(function() {
        loadingBar.classList.remove('active');
        loadingBar.style.width = '0%'; 
    }, 1000); 
}

// Example of triggering loading bar
document.addEventListener('DOMContentLoaded', function() {
    showLoadingBar();
    // thoi gian loading ket thuc chuoi
    setTimeout(hideLoadingBar, 3000);
});

document.addEventListener('DOMContentLoaded', function() {
    var closeButtons = document.querySelectorAll('.alert-dismissible .close');
    var alerts = document.querySelectorAll('.alert');

    // auto dong sau do thoi gian lap lai
    alerts.forEach(function(alert) {
        setTimeout(function() {
            alert.classList.add('hidden');
            setTimeout(function() {
                alert.style.display = 'none';
            }, 300); // thoi gian cho ket thuc chuoi
        }, 5000); // 5s sau do tu dong dong
    });

    // dong thay thong bao nay
    closeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var alert = this.closest('.alert');
            alert.classList.add('hidden');
            setTimeout(function() {
                alert.style.display = 'none';
            }, 300); // thoi gian cho ket thuc chuoi
        });
    });
});
</script>
