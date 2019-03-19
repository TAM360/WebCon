<template>
    <ul class="chat">
        <div class="left clearfix" v-for="message in messages">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{ message.user.name }}
                    </strong>
                </div>
                <p>
                    {{ message.message }}
                </p>
            </div>
        </div>
    </ul>
</template>

<script>
  export default {
    props: ['messages'],
     
  };
</script>