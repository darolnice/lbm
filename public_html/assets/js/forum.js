$(document).ready( function () {

    document.querySelectorAll('.blg__more_cmt').forEach(item =>{
        item.addEventListener('click', function () {
            if (document.querySelector('.__blg_cmt')){
                let cmts = item.parentNode.parentNode.parentNode.parentNode.children[1].children[3];
                cmts.style.display = 'block';
            }
        });
    });

    document.querySelectorAll('.___img0').forEach(item =>{
        item.addEventListener('mouseover', function (e) {
            e.target.parentNode.parentNode.children[1].children[0].firstElementChild.style.opacity = '0.5';
        });
        item.addEventListener('mouseout', function (e) {
            e.target.parentNode.parentNode.children[1].children[0].firstElementChild.style.opacity = '1';
        });
    });

    document.querySelectorAll("#sendCmt").forEach(item =>{
        item.addEventListener('click', function (e) {
            e.preventDefault();
            let cmmt = e.target.parentNode.firstElementChild.value;
            let id = e.target.getAttribute('data-pid');
            let img = document.querySelector('#persn').getAttribute('src');
            if (cmmt !== ''){
                new Index().jxPostData('jxAddCmt', this, id, cmmt, img);
            }
        });
    });

    document.querySelector('#blg__ipt__').addEventListener('input', function () {
        if (this.value !== ""){
            new Index().jxGetSphAnyWhere('jxSphAnyWhere?Sp='+this.value, this);
        }else {
            document.querySelector('.blogResDiv').style.display = 'none';
            document.querySelector('.blg_arc_cat').style.visibility = 'visible';
        }
    });

    // console.log(document.querySelector('.cpage').parentNode)

    let regExp1 = /blog\?page=0/ig;
    if (location.href.match(regExp1)){
        location.href = 'http://localhost/projets/lebolma/blog';
    }
});