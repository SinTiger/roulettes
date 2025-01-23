jQuery(document).ready(function ($) {
    // $(document).ready(function () {
    //     var el = $(".direct-chat-messages")[0];
    //     el.scrollTop = el.scrollHeight;
    // });


    // function scrollChat() {
    //     var el = $(".direct-chat-messages")[0];
    //     el.scrollTop = el.scrollHeight;
    // }

    // document.addEventListener('livewire:initialized', () => {
    //     var el = $(".direct-chat-messages")[0];
    //     el.scrollTop = el.scrollHeight;
    // })

    // Livewire.on('goBottom', (event) => {
    //     var block = $('.procrutka-messages');
    //     block.scrollTop = block.scrollHeight;
    // })

    // ПОХОЖЕ, что проблема в том, что объект переинициализируется и больше скриптом не подцепляется

    // function sayHi() {
    //     var el = $(".direct-chat-messages");
    //     el.scrollTop = el.scrollHeight;
    //     setTimeout(sayHi, 5000);
    //     console.log('запуск прокрутки');
    // }
    // setTimeout(sayHi, 5000);


    // window.livewire.hook('afterDomUpdate', () => {
    //     // Прокрутка вниз после загрузки данных
    //     window.scrollTo(0, document.body.scrollHeight);
    // });


});
