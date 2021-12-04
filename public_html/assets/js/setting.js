$(document).ready(function () {

    /**
     * @param form
     * @param btn
     * @param indice
     * @param context
     */
    let postSetting = (form, btn ,indice = null, context)=>{
        let form_ = document.querySelector('#'+form);
        let btn_ = document.querySelector('#'+btn);

        btn_.addEventListener('click', (e)=>{
            if (form_.value !== ''){
                e.preventDefault();
                new Index().jxPostData('ftcSetD', context, form_.value, indice);
            }else {
                new Index().lbmAlert('Please complete form', 'info');
            }
        });
    }


    //side bar start
    let setcolor = (item1, item2, item3, item4)=>{
        document.querySelector('.'+item1).style.color = '#5e5c5c';
        document.querySelector('.'+item2).style.color = '#5e5c5c';
        document.querySelector('.'+item3).style.color = '#5e5c5c';
        document.querySelector('.'+item4).style.color = '#4493e7';
    }
    function displayTab() {
        document.querySelector('.using').style.display = 'block';
        document.querySelector('.confidentiality').style.display = 'block';
        document.querySelector('.theme').style.display = 'block';
        document.querySelector('.sett_sec4').style.marginTop = '-101.5%';
    }
    document.querySelector('.usg1').addEventListener('click', function () {
        displayTab();
        new Index().scrollTo (-250);
        setcolor('thm1', 'cfd1', 'pynt1','usg1');
    });
    document.querySelector('.thm1').addEventListener('click', function () {
        displayTab();
        new Index().scrollTo (515);
        setcolor('usg1', 'cfd1', 'pynt1', 'thm1');
    });
    document.querySelector('.cfd1').addEventListener('click', function () {
        displayTab();
        new Index().scrollTo (850);
        setcolor('usg1', 'thm1', 'pynt1', 'cfd1');
    });
    document.querySelector('.pynt1').addEventListener('click', function () {
        document.querySelector('.using').style.display = 'none';
        document.querySelector('.confidentiality').style.display = 'none';
        document.querySelector('.theme').style.display = 'none';

        document.querySelector('.sett_sec4').style.marginTop = '-215px';
        new Index().scrollTo (-1);
        setcolor('usg1', 'thm1', 'cfd1', 'pynt1');
    });
    //side bar end

    document.querySelectorAll('#tbod tr').forEach(item =>{
       item.addEventListener('click', ()=>{
           item.children[0].children[2].style.display = 'block';
           item.children[0].children[0].style.display = 'block';
       });
    });
    document.querySelectorAll('.close').forEach(item =>{
        item.addEventListener('click' ,(e)=>{
            let class_ = e.target.getAttribute('class');
            let id = item.nextElementSibling.nextElementSibling.getAttribute('id');
            $('#'+id).fadeOut();
            $('.'+class_).fadeOut();
        });
    });
    document.querySelectorAll('#_s_fc h5').forEach(item =>{
        item.addEventListener('click', ()=>{
            document.querySelector(".__op").style.boxShadow = '0 1px 2px #2b2a2a';
            document.querySelector(".__btns").style.boxShadow = '0 1px 2px #2b2a2a';
            document.querySelector(".__prc").style.boxShadow = '0 1px 2px #2b2a2a';
            document.querySelector(".__pn").style.boxShadow = '0 1px 2px #2b2a2a';

            item.style.boxShadow = '1px 1px 2px #0acec7';
            document.querySelector(".colr").style.display = 'block';
        });
    });

    document.querySelector('.yes').addEventListener('click', function () {
        document.querySelector(".shp_form").style.display = 'block';
    });
    document.querySelector('.no').addEventListener('click', function (e) {
        e.stopPropagation();
        document.querySelector(".shp_form").style.display = 'none';
        document.querySelector(".yes_no").style.display = 'none';
    });
    document.querySelectorAll(".__tb_clr h5").forEach((colors)=>{
        colors.style.display = 'block';
    });

    document.querySelector('.sett_cls').addEventListener('click', ()=>{
       localStorage.setItem('active', '0');
    });

    $(".ic").on('click', function () {open('./', '_parent')});

    postSetting('setshopname', '__snSetid','shop_name', 'sett_sub_item');
    postSetting('__setdes_ta', '__setdes_id','description', 'sett_desc_item');

});