<template>
    <div>
        <button type="button" class="add-button-inside" data-toggle="modal" data-target="#exampleModal">
            <svg style="width: 25px" aria-hidden="true" focusable="false" data-prefix="fa-regular" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M432 256C432 269.3 421.3 280 408 280h-160v160c0 13.25-10.75 24.01-24 24.01S200 453.3 200 440v-160h-160c-13.25 0-24-10.74-24-23.99C16 242.8 26.75 232 40 232h160v-160c0-13.25 10.75-23.99 24-23.99S248 58.75 248 72v160h160C421.3 232 432 242.8 432 256z" fill="currentColor"/></svg>
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Добавить кнопку</h3>
                        <a type="button"  data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                            <svg style="width: 20px" aria-hidden="true" focusable="false" data-prefix="fa-thin" data-icon="xmark" class="svg-inline--fa fa-xmark fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M317.7 402.3c3.125 3.125 3.125 8.188 0 11.31c-3.127 3.127-8.186 3.127-11.31 0L160 267.3l-146.3 146.3c-3.127 3.127-8.186 3.127-11.31 0c-3.125-3.125-3.125-8.188 0-11.31L148.7 256L2.344 109.7c-3.125-3.125-3.125-8.188 0-11.31s8.188-3.125 11.31 0L160 244.7l146.3-146.3c3.125-3.125 8.188-3.125 11.31 0s3.125 8.188 0 11.31L171.3 256L317.7 402.3z" fill="currentColor"/></svg>
                            </span>
                        </a>

                    </div>
                    <div class="modal-body">
                        <p><input type="text" v-model="company" /></p>
                        <ul class="cutaway-buttons-list">
                            <li v-for="element in contacts">
                                <a @click="addButton(element.id, $event)" :style="{color: element.color, backgroundColor: element.background_color}" target="_blank" href="#" class="contact-button">
                                    <div class="contact-logo">
                                        <img style="width:25px" class="contact-logo-img" :src="'/' + element.logo">
                                    </div>
                                    <div class="contact-text">
                                        <div class="contact-text-top">{{ element.title}}</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AddButton",
        props: ['contacts', 'profile_id'],
        data() {
            return {

            }
        },
        methods: {
            addButton(contact_id, event){
                event.preventDefault();
                document.location.href = '/add-contact/' + this.profile_id + '/' + contact_id;

            },
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>
