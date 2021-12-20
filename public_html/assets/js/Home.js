$(document).ready(function () {
    // new Index().wsEventsLarge();

    $("#main__footer").css("margin-top", '50vh');

    let timer, elements, slides, slidesWidth;
    let compter = 0;


    const diapo = document.querySelector('.diapo');
    elements = document.querySelector('.elements');
    slides = Array.from(elements.children);
    slidesWidth = diapo.getBoundingClientRect().width;

    document.querySelector('#nav_right').addEventListener('click', function () {
        slideright();
    });
    function slideright(){
        compter--
        if (compter < 0){
            compter = slides.length - 1;
        }
        let move = -slidesWidth * compter;
        elements.style.transform = `translateX(${move}px)`;
    }

    document.querySelector('#nav_left').addEventListener('click', function () {
        slideleft();
    });
    function slideleft() {
        compter++
        if (compter === slides.length){
            compter = 0;
        }
        let move = -slidesWidth * compter;
        elements.style.transform = `translateX(${move}px)`;
    }

    timer = setInterval(slideright, 10000);

    document.querySelector('.nav-bar').addEventListener('mouseover', stoptimer );
    diapo.addEventListener('mouseout', startimer);
    diapo.addEventListener('mouseover', stoptimer );
    startimer
    function stoptimer() {
        clearInterval(timer);
    }
    function startimer() {
        timer = setInterval(slideright, 8000);
    }

    let tm = document.querySelector('.state_price');
    let barr = document.querySelector('.barometre');
    let cmm = new Index();

    if (cmm.getCookie('hrpc')){
        tm.textContent = 'Price: [$1'+' - '+'$'+cmm.getCookie('hrpc')+']';
        tm.style.left = '30%';
        tm.style.display = 'block';
    }

    barr.addEventListener('input', function () {
        let value = barr.value;
        let max = this.getAttribute('max');
        tm.style.display = 'block';
        tm.style.left = value/2+'%';
        tm.textContent = 'Price: [$1'+' - '+'$'+((value / max)*1000).toFixed(0)+']';
    });
    barr.addEventListener('change', function () {
        let max = this.getAttribute('max');
        let value = (((barr.value / max)*1000).toFixed(0));
        cmm.jxPostData('jxHomeRange', this, value, 'hrpc');
    });

    let hs = document.querySelector("#blg__ipt__");
    hs.addEventListener('input', ()=>{
        if (hs.value !== ''){
            cmm.jxHomeShopSearch('#home_ss_div', hs.value);
        }
        else {
            $('#home_ss_div').hide();
            $('.srtby').css('visibility', 'visible');
        }
    });




    /**
     *  partial best start
     */

    $('#_bslg_art_t1').on('click', function () {
        window.open('best?f=sale', '_parent')
    });

    /**
     * show best shop
     */
    $('.bshp_art_t1_vm').on('click', function () {
        window.open('best?f=shop', '_parent')
    });
    /**
     *  partial best end
     */















});