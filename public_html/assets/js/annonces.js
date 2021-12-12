$(document).ready(function () {

    document.querySelectorAll('#res_ann').forEach(res =>{
        res.addEventListener('click', function () {

            if (document.getElementById('answer_form')){
                if (!res.parentNode.parentNode.children[3].children[0].children[1].classList.contains("JS_res_ul")){
                    res.parentNode.parentNode.children[3].children[0].children[1].classList.replace("res_ul", "JS_res_ul")
                    res.parentNode.parentNode.children[3].children[1].style.display = 'block';
                    res.innerHTML = 'HIDE';
                }
                else{
                    res.parentNode.parentNode.children[3].children[0].children[1].classList.replace( "JS_res_ul", "res_ul",)
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



});