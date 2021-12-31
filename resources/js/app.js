require('./bootstrap');


const messages_el = document.querySelector("#messages");
const username_input = document.querySelector("#username");
const messages_input = document.querySelector("#message");
const message_form = document.querySelector("#message_form");

message_form.addEventListener('submit', (e) => {
    e.preventDefault();

    let has_errors = false;

    if(username_input.value == '') {
        alert('Please enter an username');
        has_errors = true;
    }
    if(messages_input.value == '') {
        alert('Please enter an message');
        has_errors = true;
    }
    if(has_errors){
        return; 
    }

    const options = {
        method: 'post',
        url: '/send-message',
        data: {
            username: username_input.value,
            message: messages_input.value,
        }
    }

    axios(options);
});


window.Echo.channel('chat')
    .listen('.message', (e) => {
        console.log(e)
    })


