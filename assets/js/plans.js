$(document).ready(function () {

    document.querySelector('.pricing-card').addEventListener('mouseover', function () {
        document.querySelector('.pricing-card-header').style.boxShadow = "0 0 0 15em #22bbbb";
        document.querySelector('.pricing-card-header').style.borderRadius = '0 ';
    });
    document.querySelector('.pricing-card').addEventListener('mouseout', function () {
        document.querySelector('.pricing-card-header').style.boxShadow = "none";
        document.querySelector('.pricing-card-header').style.borderRadius = '0 0 15px 15px';
    });

    document.querySelector('#prof__div').addEventListener('mouseover', function () {
        document.querySelector('#pricing-card-h1').style.boxShadow = "0 0 0 15em #22bbbb";
        document.querySelector('#pricing-card-h1').style.borderRadius = '0 ';
    });
    document.querySelector('#prof__div').addEventListener('mouseout', function () {
        document.querySelector('#pricing-card-h1').style.boxShadow = "none";
        document.querySelector('#pricing-card-h1').style.borderRadius = '0 0 15px 15px';
    });

    document.querySelector('#prem__div').addEventListener('mouseover', function () {
        document.querySelector('#pricing-card-h2').style.boxShadow = "0 0 0 15em #22bbbb";
        document.querySelector('#pricing-card-h2').style.borderRadius = '0 ';
    });
    document.querySelector('#prem__div').addEventListener('mouseout', function () {
        document.querySelector('#pricing-card-h2').style.boxShadow = "none";
        document.querySelector('#pricing-card-h2').style.borderRadius = '0 0 15px 15px';
    });

    document.querySelector('#ultim__div').addEventListener('mouseover', function () {
        document.querySelector('#pricing-card-h3').style.boxShadow = "0 0 0 15em #22bbbb";
        document.querySelector('#pricing-card-h3').style.borderRadius = '0 ';
    });
    document.querySelector('#ultim__div').addEventListener('mouseout', function () {
        document.querySelector('#pricing-card-h3').style.boxShadow = "none";
        document.querySelector('#pricing-card-h3').style.borderRadius = '0 0 15px 15px';
    });


    // recuperation du moyen de paiement
    const visa = document.querySelector('.mth-p_visa');
    const paypal = document.querySelector('.mth-p_PayPal');
    const bank = document.querySelector('.mth-p_Bank');
    const momo = document.querySelector('.mth-p_Mobil');
    const om = document.querySelector('.mth-p_Orange');
    var meth_tab = [visa, paypal, bank, momo, om];
    for(var i = 0; i < meth_tab.length; i++){
        meth_tab[i].addEventListener('click', function () {
            localStorage.setItem('active', '1');
            var c = document.querySelector('input[type = "radio"]:checked');
            document.querySelectorAll('.order-btn').forEach((slct)=>{
                slct.setAttribute('value', 'ORDER BY'+c.value+'NOW');
            });
        });
    }



    localStorage.setItem('active', '0');
    document.querySelector('#basic').addEventListener('click', function (e) {
        if (localStorage.getItem('active') === '0'){
            e.preventDefault();
            document.querySelector('.__cyp p').style.marginLeft = '31%';

            document.querySelector('#prof__div').style.display = 'none';
            document.querySelector('#prem__div').style.display = 'none';
            document.querySelector('#ultim__div').style.display = 'none';

            document.querySelector('.mth-p').style.display = 'flex';
        }else {
            localStorage.setItem('active', '0');
        }
    });
    document.querySelector('#Professional').addEventListener('click', function (e) {
        if (localStorage.getItem('active') === '0'){
            e.preventDefault();
            document.querySelector('.__cyp p').style.marginLeft = '31%';

            document.querySelector('.pricing-card').style.display = 'none';
            document.querySelector('#prem__div').style.display = 'none';
            document.querySelector('#ultim__div').style.display = 'none';

            document.querySelector('.mth-p').style.display = 'flex';
        }else {
            localStorage.setItem('active', '0');
        }
    });
    document.querySelector('#Premium').addEventListener('click', function (e) {
        if (localStorage.getItem('active') === '0'){
            e.preventDefault();
            document.querySelector('.__cyp p').style.marginLeft = '31%';

            document.querySelector('.pricing-card').style.display = 'none';
            document.querySelector('#ultim__div').style.display = 'none';
            document.querySelector('#prof__div').style.display = 'none';

            document.querySelector('.mth-p').style.display = 'flex';
        }else {
            localStorage.setItem('active', '0');
        }
    });
    document.querySelector('#Ultimate').addEventListener('click', function (e) {
        if (localStorage.getItem('active') === '0'){
            e.preventDefault();
            document.querySelector('.__cyp p').style.marginLeft = '31%';

            document.querySelector('.pricing-card').style.display = 'none';
            document.querySelector('#prof__div').style.display = 'none';
            document.querySelector('#prem__div').style.display = 'none';

            document.querySelector('.mth-p').style.display = 'flex';
        }else {
            localStorage.setItem('active', '0');
        }
    });















});