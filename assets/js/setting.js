$(document).ready(function () {

    document.querySelectorAll('tr').forEach((__tr) =>{
        __tr.style.transitionDuration = '.6s';
    });


    function createForm(fr_name, fr_typ, el_attr_meth = 'post', frm_id) {
        fr_name = document.createElement(fr_typ);
        fr_name.setAttribute('id', frm_id);
        fr_name.setAttribute('method', el_attr_meth);

        return fr_name;
    }
    function createInput(in_var, in_typ, in_attr_typ, in_attr_name, in_attr_class, in_attr_value = '', pl_holder = ''){
        in_var = document.createElement(in_typ);
        in_var.setAttribute('type', in_attr_typ);
        in_var.setAttribute('name', in_attr_name);
        in_var.setAttribute('class', in_attr_class);
        in_var.setAttribute('value', in_attr_value);
        in_var.setAttribute('placeholder', pl_holder);
        return in_var;
    }

    document.querySelector('.usg1').addEventListener('click', function () {
        displayTab();
        scrollTo (-250);

        document.querySelector('.thm1').style.color = '#5e5c5c';
        document.querySelector('.cfd1').style.color = '#5e5c5c';
        document.querySelector('.pynt1').style.color = '#5e5c5c';
        this.style.color = '#4493e7';
    });

    document.querySelector('.thm1').addEventListener('click', function () {
        displayTab();
        scrollTo (515);

        document.querySelector('.usg1').style.color = '#5e5c5c';
        document.querySelector('.cfd1').style.color = '#5e5c5c';
        document.querySelector('.pynt1').style.color = '#5e5c5c';
        this.style.color = '#4493e7';
    });

    document.querySelector('.cfd1').addEventListener('click', function () {
        displayTab();
        scrollTo (850);

        document.querySelector('.usg1').style.color = '#5e5c5c';
        document.querySelector('.thm1').style.color = '#5e5c5c';
        document.querySelector('.pynt1').style.color = '#5e5c5c';
        this.style.color = '#4493e7';
    });

    document.querySelector('.pynt1').addEventListener('click', function () {
        document.querySelector('.using').style.display = 'none';
        document.querySelector('.confidentiality').style.display = 'none';
        document.querySelector('.theme').style.display = 'none';

        document.querySelector('.sett_sec4').style.marginTop = '-215px';
        scrollTo (-1);

        document.querySelector('.usg1').style.color = '#5e5c5c';
        document.querySelector('.thm1').style.color = '#5e5c5c';
        document.querySelector('.cfd1').style.color = '#5e5c5c';
        this.style.color = '#4493e7';
    });

    function scrollTo(position) {
        window.scrollTo({
            top : position,
            left:0,
            behavior:"smooth"
        });
    }

    function displayTab() {
        document.querySelector('.using').style.display = 'block';
        document.querySelector('.confidentiality').style.display = 'block';
        document.querySelector('.theme').style.display = 'block';
        document.querySelector('.sett_sec4').style.marginTop = '-101.5%';
    }

    document.querySelector('.__tb_sn').addEventListener('click', function () {
        if (!document.querySelector("#sett_sub_item")){
            let sub_item = createForm('sub_item', 'form', 'post', 'sett_sub_item');
            document.querySelector('.__tb_sn td').appendChild(sub_item);

            let in_sub = createInput('in_sub', 'input', 'text',
                'in_sub', 'sett_inSub');

            let in_submt = createInput('in_submt', 'input', 'submit',
                'in_submt', 'sett_i_Sub', "SAVE");

            document.querySelector('#sett_sub_item').appendChild(in_sub);
            document.querySelector('#sett_sub_item').appendChild(in_submt);

        }else {
            return null;
        }
    });
    document.querySelector('.__tb_desc').addEventListener('click', function () {
        if (!document.querySelector("#sett_desc_item")){
            let sett_desc_item = createForm('sett_desc_item', 'form', 'post', 'sett_desc_item');
            document.querySelector('.__tb_desc td').appendChild(sett_desc_item);

            let in_desc = createInput('in_desc', 'textarea', 'text',
                'in_desc', 'sett_inDesc');

            let sett_desc_sbmt = createInput('sett_desc_sbmt', 'input', 'submit',
                'desc_sbmt', 'sett_i_desc', "SAVE");

            document.querySelector('#sett_desc_item').appendChild(in_desc);
            document.querySelector('#sett_desc_item').appendChild(sett_desc_sbmt);

        }else {
            return null;
        }
    });
    document.querySelector('.__tb_cp').addEventListener('click', function () {
        if (!document.querySelector("#sett_cp_item")){
            let sett_cp_item = createForm('sett_cp_item', 'form', 'post', 'sett_cp_item');
            document.querySelector('.__tb_cp td').appendChild(sett_cp_item);

            let in_cp = createInput('in_cp', 'input', 'file',
                'in_cp', 'in_cp');

            let sett_cp_sbmt = createInput('sett_cp_sbmt', 'input', 'submit',
                'sett_cp_sbmt', 'sett_cp_sbmt', "SAVE");

            document.querySelector('#sett_cp_item').appendChild(in_cp);
            document.querySelector('#sett_cp_item').appendChild(sett_cp_sbmt);

        }else {
            return null;
        }
    });
    document.querySelector('.__tb_pa').addEventListener('click', function () {
        document.querySelector(".pa_form").style.display = 'block';
    });
    document.querySelector('.__tb_mt').addEventListener('click', function () {
        if (!document.querySelector("#sett_mt_item")){
            let mt_item = createForm('sub_item', 'form', 'post', 'sett_mt_item');
            document.querySelector('.__tb_mt td').appendChild(mt_item);

            let in_mt = createInput('in_sub', 'input', 'text',
                'in_mt_nm', 'sett_inSub');

            let in_sbmt_mt = createInput('in_submt', 'input', 'submit',
                'in_sbmt_mt', 'sett_i_Sub', "SAVE");

            document.querySelector('#sett_mt_item').appendChild(in_mt);
            document.querySelector('#sett_mt_item').appendChild(in_sbmt_mt);

        }else {
            return null;
        }
    });
    document.querySelector('.__tb_lt').addEventListener('click', function () {
        document.querySelector(".lt_form").style.display = 'block';
    });

    document.querySelector('.__tb_shp').addEventListener('click', function () {
        document.querySelector(".yes_no").style.display = 'block';
    });
    document.querySelector('.yes').addEventListener('click', function () {
        document.querySelector(".shp_form").style.display = 'block';
    });
    document.querySelector('.no').addEventListener('click', function (e) {
        e.stopPropagation();
        document.querySelector(".yes_no").style.display = 'none';
    });

    document.querySelector('.__tb_dv').addEventListener('click', function () {
        document.querySelector(".dv_form").style.display = 'block';
    });


    document.querySelector('.__tb_th').addEventListener('click', function () {
        document.querySelector(".light_dark").style.display = 'block';
    });

    document.querySelector('.__tb_cn').addEventListener('click', function (e) {
        e.stopPropagation();
        document.querySelector(".cn_form").style.display = 'block';
    });

    document.querySelector('.__tb_clr').addEventListener('click', function () {
        document.querySelectorAll(".__tb_clr h5").forEach((colors)=>{
            colors.style.display = 'block';
        });
    });
    document.querySelector(".__pn").addEventListener('click', function () {
            this.style.boxShadow = '1px 1px 2px #0acec7';
            document.querySelector(".colr").style.display = 'block';

        document.querySelector(".__prc").style.boxShadow = '0 1px 2px #2b2a2a';
        document.querySelector(".__op").style.boxShadow = '0 1px 2px #2b2a2a';
        document.querySelector(".__btns").style.boxShadow = '0 1px 2px #2b2a2a';
    });
    document.querySelector(".__prc").addEventListener('click', function () {
        this.style.boxShadow = '1px 1px 2px #0acec7';
        document.querySelector(".colr").style.display = 'block';

        document.querySelector(".__pn").style.boxShadow = '0 1px 2px #2b2a2a';
        document.querySelector(".__op").style.boxShadow = '0 1px 2px #2b2a2a';
        document.querySelector(".__btns").style.boxShadow = '0 1px 2px #2b2a2a';
    });
    document.querySelector(".__op").addEventListener('click', function () {
        this.style.boxShadow = '1px 1px 2px #0acec7';
        document.querySelector(".colr").style.display = 'block';

        document.querySelector(".__pn").style.boxShadow = '0 1px 2px #2b2a2a';
        document.querySelector(".__prc").style.boxShadow = '0 1px 2px #2b2a2a';
        document.querySelector(".__btns").style.boxShadow = '0 1px 2px #2b2a2a';
    });
    document.querySelector(".__btns").addEventListener('click', function () {
        this.style.boxShadow = '1px 1px 2px #0acec7';
        document.querySelector(".colr").style.display = 'block';

        document.querySelector(".__prc").style.boxShadow = '0 1px 2px #2b2a2a';
        document.querySelector(".__op").style.boxShadow = '0 1px 2px #2b2a2a';
        document.querySelector(".__pn").style.boxShadow = '0 1px 2px #2b2a2a';
    });

    document.querySelector('.__tb_hp').addEventListener('click', function () {
        document.querySelector(".hp_form").style.display = 'block';
    });


    document.querySelector('.__tb_sk').addEventListener('click', function () {

        if (!document.querySelector("#sett_sk_item")){
            let sk_item = createForm('sk_item', 'form', 'post', 'sett_sk_item');
            document.querySelector('.__tb_sk td').appendChild(sk_item);

            let in_sk = createInput('in_sk', 'input', 'text',
                'in_sk', 'sett_inSk', '', '10 characters min');

            let in_sbmt_S = createInput('in_sbmt_S', 'input', 'submit',
                'in_submt', 'sett_i_Sav', "SAVE");

            let in_sbmt_G = createInput('in_submt', 'input', 'button',
                'sett_i_GEN', 'sett_i_GEN', "GENERATE");

            document.querySelector('#sett_sk_item').appendChild(in_sk);
            document.querySelector('#sett_sk_item').appendChild(in_sbmt_G);
            document.querySelector('#sett_sk_item').appendChild(in_sbmt_S);

        }else {
            return null;
        }

    });

    document.querySelector('.__tb_pi').addEventListener('click', function () {
        document.querySelector(".p__pi").style.display = 'block';
    });

    document.querySelector('.__tb_cmt').addEventListener('click', function () {
        document.querySelector(".cmt__pi").style.display = 'block';
    });

    document.querySelector('.__tb_rl').addEventListener('click', function () {
        if (!document.querySelector("#sett_rule_item")){
            let sett_rule_item = createForm('sett_desc_item', 'form', 'post', 'sett_rule_item');
            document.querySelector('.__tb_rl td').appendChild(sett_rule_item);

            let in_rl = createInput('in_rl', 'textarea', 'text',
                'in_rl', 'sett_inRl');

            let sett_rl_sbmt = createInput('sett_rl_sbmt', 'input', 'submit',
                'rl_sbmt', 'sett_i_rl', "SAVE");

            document.querySelector('#sett_rule_item').appendChild(in_rl);
            document.querySelector('#sett_rule_item').appendChild(sett_rl_sbmt);

        }else {
            return null;
        }
    });

    document.querySelector('.pm__mth').addEventListener('click', function () {
        document.querySelector('.using').style.display = 'none';
        document.querySelector('.confidentiality').style.display = 'none';
        document.querySelector('.theme').style.display = 'none';

        scrollTo (-1);
        document.querySelector(".pm__form").style.display = 'block';
    });



    document.querySelector('.sett_cls').addEventListener('click', ()=>{
       localStorage.setItem('active', '0');
    });











    $(".bck___hm").on('click', function () {
        open('./', '_parent');
    });



    window.onclick = function (e) {
        if (!e.target.matches('.__tb_cn')){
            document.querySelector(".cn_form").style.display = 'none';
        }
    }


});