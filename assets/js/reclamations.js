$(document).ready(function () {
    let scrollTo = function (position) {
        window.scrollTo({
            top : position,
            left:0,
            behavior:"smooth"
        });
    }

    $('.pre_btn').on('click', function () {
        scrollTo(0)
        $('.rec_choose').fadeIn(500)
    });

    $('#rec_cls').on('click', function () {
        $('.rec_choose').fadeOut(300)
    });

    $('.rec_sig_btn').on('click', function () {
        $('.rec_choose').fadeOut(300)

        $(".rec_back_prd").fadeOut()
        $(".rec_resol").fadeOut()

        scrollTo(650)
        $(".rec_sig").fadeIn(1300)
    });

    $('.rec_btn').on('click', function () {
        $('.rec_choose').fadeOut(300)

        $(".rec_resol").fadeOut()
        $(".rec_sig").fadeOut()

        scrollTo(650)
        $(".rec_back_prd").fadeIn(1300)
    });

    $('.rec_resol_btn').on('click', function () {
        $('.rec_choose').fadeOut(300)

        $(".rec_back_prd").fadeOut()
        $(".rec_sig").fadeOut()

        scrollTo(650)
        $(".rec_resol").fadeIn(1300)
    });

    document.querySelector('#s_about').addEventListener('change', function () {
        if (this.value === 'About business custumers'){
            $('#s_name_').fadeIn(500);
        }else {
            $('#s_name_').hide();
        }
    });

    document.forms['bp_form'].addEventListener("submit", function (e) {
        e.preventDefault();
        new Index().jxPostData('jxAddRec', this, this['b_name'].value,
        this['b_email'].value, this['b_phone'].value, this['b_qte'].value,
        this['p_name'].value, this['b_reason'].value, this['b_busi_name'].value,
        this['b_tid'].value, this['b_issu'].value, this['rec_ta'].value);
    });

    document.forms['alert_form'].addEventListener("submit", function (e) {
        e.preventDefault();
        new Index().jxPostData('jxAddAlrt', this, this['s_name'].value,
            this['s_email'].value, this['s_phone'].value, this['s_rec_about'].value,
            this['s_busi_name'].value, this['s_rec_ta'].value);
    });

    document.forms['abtss_name'].addEventListener("submit", function (e) {
        e.preventDefault();
        new Index().jxPostData('jxAbttsm', this, this['a_name'].value, this['a_rec_id'].value)
    });



});