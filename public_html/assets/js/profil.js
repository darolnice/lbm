$(document).ready(function () {

    document.querySelector('#sec4_stat').addEventListener('mouseover', function () {
        var act = document.querySelector('.progress-done')
        setTimeout(()=>{
            act.style.width = act.getAttribute('data-done') + '%';
            act.style.opacity = 1;
        }, 500);

        var act2 = document.querySelector('.progress-done2')
        setTimeout(()=>{
            act2.style.width = act2.getAttribute('data-done') + '%';
            act2.style.opacity = 1;
        }, 500);

        var act3 = document.querySelector('.progress-done3')
        setTimeout(()=>{
            act3.style.width = act3.getAttribute('data-done') + '%';
            act3.style.opacity = 1;
        }, 500);
    });

    // const  ratio = .1;
    // const option = {
    //     root: null,
    //     rootMargin:'0px',
    //     threshold: ratio
    // }
    // var handleInter = function (entries, observer) {
    //     entries.forEach(function (entry) {
    //         if (entry.intersectionRatio > ratio){
    //             entry.target.classList.add('reveal-visible');
    //             observer.unobserve(entry.target);
    //         }
    //     });
    // }
    // const observer = new IntersectionObserver(handleInter, option);
    // let obs = observer.observe(document.querySelectorAll('[class*= "reveal-"]'));
    // obs.forEach(function (r) {
    //     observer.observe(r);
    // });

    document.forms['prof_form'].addEventListener('submit', function (e) {
        e.preventDefault();
        let email = document.querySelector('#prof_mail').getAttribute('data-mail');
        new Index().jxPostData('jxProfmail', this, this['name'].value, this['email'].value, this['subject'].value, this['message'].value, email);
    });


});