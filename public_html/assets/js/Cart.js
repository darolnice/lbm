$(document).ready(function () {    sessionStorage.setItem('cc_active', '0');    let btn = document.querySelector('.bnw');    btn.addEventListener('click', function (e) {        if (btn.value === 'CONTINUE'){            if (sessionStorage.getItem('cc_active') === '0'){                e.preventDefault();                document.querySelector('.chkcrt_table').style.marginRight = '35%';                document.querySelectorAll('td').forEach((n_td)=>{n_td.style.fontSize = '10.5px';});                document.querySelector('.sec2_cc').style.display = 'block';                $('.cc_pi, .cc_si').fadeIn(300);            }else {                localStorage.setItem('cc_active', '0');            }        }    });    document.querySelectorAll('#cc_rad').forEach(item =>{        item.addEventListener('click', function () {            localStorage.setItem('cc_active', '1');            var c = document.querySelector('input[type = "radio"]:checked');            lchx = c.value;            document.querySelectorAll('.bnw').forEach((slct)=>{                slct.setAttribute('value', 'ORDER WITH '+lchx);                new Index().SetCookie('xirp', lchx);            });        });    });    const price = document.querySelectorAll('#crt_price');    price.forEach(prix =>{        let sn = prix.getAttribute('data-shopname')        let pid = prix.getAttribute('data-pid')        new Index().jxPostData("jxPp", prix, sn,  pid);    });    document.querySelector('.cart_more_option').addEventListener('click', ()=>{        $('.optdiv').toggle();    });    window.onclick = (e)=>{        if (!e.target.matches('.cart_more_option')){$('.optdiv').hide()}    }    document.querySelectorAll(".optdiv li").forEach(item =>{        item.addEventListener('click', (e)=>{            if (e.target.innerHTML !== ''){                new Index().jxPostData('jxrC', e.target.getAttribute('data-cy'), e.target.getAttribute('data-cy'));            }        })    });    document.querySelectorAll('.minus').forEach(item =>{        item.addEventListener('click', ()=>{            let qte = item.nextSibling.textContent.trim();            if (qte > 1){                item.nextSibling.textContent = --qte;                let data = item.getAttribute('data-id');                let crr = item.getAttribute('data-crr');                let pu = item.getAttribute('data-pu');                if(data !== ''){                    new Index().jxPostData('jxUDCart', item, data, qte, pu, crr);                }            }        });    });    document.querySelectorAll('.plus').forEach(item =>{        item.addEventListener('click', ()=>{            let qte = item.previousSibling.textContent.trim();            let lim = item.getAttribute('data-lim');            if (qte < lim){                let nq = ++item.previousSibling.textContent;                let data = item.getAttribute('data-id');                let crr = item.getAttribute('data-crr');                let pu = item.getAttribute('data-pu');                if(data !== '' && crr !== '' && pu !== ''){                    new Index().jxPostData('jxUDCart', item, data, nq, pu, crr);                }            }        });    });});