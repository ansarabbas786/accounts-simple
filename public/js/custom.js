$(function(){
    $('.container').draggable({
//        axis: 'y'
        cancel: 'p',
//        containment: [100,100 , 500,300],
        cursor: 'pointer',
        cursorAt: {
            left:50 ,
            top:5
        },
//        disabled: true
//        grid: [100 , 50],
        handle: 'h4',
        helper: 'clone',
//        helper: function(){
//            return $('<p>uth naa sheraa</p>');
//        },
        opacity: .6,
//        revert: 'invalid',
        revertDuration: 3000,
        scope: 'game',
//        snap: true,
//        snapMode: 'both',
//        snapTolerance: 100,
        zIndex: 2
    });
});