$(document).ready(function () {

    document.querySelectorAll('#res_ann').forEach(res =>{
        res.addEventListener('click', function () {

            if (document.getElementById('answer_form')){

                if (!res.parentNode.parentNode.children[3].children[0].children[2].classList.contains("JS_res_ul")){

                    res.parentNode.parentNode.children[3].children[0].children[2].classList.replace("res_ul", "JS_res_ul");
                    res.parentNode.parentNode.children[3].children[1].style.display = 'block';
                    res.innerHTML = 'HIDE';

                }
                else{
                    res.parentNode.parentNode.children[3].children[0].children[2].classList.replace( "JS_res_ul", "res_ul",)
                    res.parentNode.parentNode.children[3].children[1].style.display = 'none';
                    res.innerHTML = 'ANSWER';
                }
            }else {
                new Index().scrollTo(0);
                $("h2").hide()
                document.querySelector('.inf_ans').style.visibility = 'visible';
            }
        });
    });

    if (document.querySelector('.becom_saler')){
        new Index().openLink('bcs__','register','_parent');
    }

    if (document.querySelector('.log__')){
        new Index().openLink('lg__', 'business','_parent');
    }

    $('#add_ann_btn__').on('click', function () {
        let idx = new Index()
        if (idx.getCookie('cud')){
            $('#res_ann_sec').fadeOut(600);
            $('#add_ann_sec').fadeIn(900);
        }else {
            idx.lbmAlert("Login please", "info");
        }

    });

    $('#ann_cancel_btn').on('click', function () {
        $('#add_ann_sec').fadeOut(500);
        $('#res_ann_sec').fadeIn(900);
    });

    document.querySelectorAll('#post__res__').forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            cmt = this.previousElementSibling;
            let ann_id = item.getAttribute('data-annonce_id');
            let annonceur = item.getAttribute('data-annonceur');
            if (cmt.value !== "") {
                new Index().jxPostData("jxAnPsCmt", this.parentNode, ann_id, annonceur, cmt.value);
            }
        });
    });

    const form = document.querySelector('#ann_srh')
    form.addEventListener('input', (e)=>{
         val = form.value;
         if (val !== ''){
             e.preventDefault();
             new Index().jxAdsearch("jxadsrh", ".annSearchDiv", val);
         }else {
             document.querySelector('.annSearchDiv').style.display = 'none';
         }
    });

    const btns = document.querySelectorAll('.ann_img_1, .ann_img_2');
    btns.forEach(btn =>{
        btn.addEventListener('click', function () {
            if (btn.previousElementSibling.getAttribute('id') === 'ad-im1'){
                document.querySelector('#ad-im1').click();

            }else {
                document.querySelector('#ad-im2').click();
            }
        })
    });

    if (document.querySelector('#ad-im1')){
        let img1 = document.querySelector('#ad-im1');
        let img2 = document.querySelector('#ad-im2');

        img1.addEventListener('input', ()=>{
            let file = img1.files[0];
            if (file){
                let reader = new FileReader();
                reader.addEventListener('load', ()=>{
                    document.querySelector('#add_ad_im1').setAttribute("src", reader.result);
                })
                reader.readAsDataURL(file);
            }
        })
        img2.addEventListener('input', ()=>{
            let file = img2.files[0];
            if (file){
                let reader = new FileReader();
                reader.addEventListener('load', ()=>{
                    document.querySelector('#add_ad_im2').setAttribute("src", reader.result);
                })
                reader.readAsDataURL(file);
            }
        })
    }

});