$(document).ready(function () {

    document.querySelectorAll('.down_arrow img').forEach(item =>{
        item.addEventListener('click', function () {
            if (item.parentNode.parentNode.parentElement.getAttribute('class') === 'responses'){
                item.parentNode.parentNode.parentElement.classList.add('res_act');
                item.parentElement.classList.add('res_img');
                this.classList.add('res_act');

            }else {
                item.parentNode.parentNode.parentElement.classList.remove('res_act');
                item.parentElement.classList.remove('res_img');
                this.classList.remove('res_act');
            }
        });
    });

    document.querySelectorAll('#res_ann').forEach(res=>{
        res.addEventListener('click', function () {
            if (document.querySelector('#answer_form')){
                if (res.parentNode.parentNode.children[1].children[2].style.display === 'none'){
                    res.parentNode.parentNode.children[1].children[1].style.display = 'none';
                    res.parentNode.parentNode.children[1].children[2].style.display = 'block';
                }else{
                    res.parentNode.parentNode.children[1].children[2].style.display = 'none';
                    res.parentNode.parentNode.children[1].children[1].style.display = 'flex';
                }
            }else {
                new Index().scrollTo(0);
                document.querySelector('.inf_ans').style.display = 'block'
                setTimeout(function () {
                    document.querySelector('.inf_ans').style.display = 'none';
                }, 10000);
            }
        });
    });

    if (document.querySelector('.becom_saler')){
        new Index().openLink(document.querySelector('.becom_saler'), 'register');
    }

    if (document.querySelector('.log__')){
        new Index().openLink(document.querySelector('.log__'), 'business');
    }

    $('#add_ann_btn__').on('click', function () {
        $('#res_ann_sec').fadeOut(600);
        $('#add_ann_sec').fadeIn(900);
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