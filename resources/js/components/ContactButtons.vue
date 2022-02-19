<template>
  <draggable
      class=""
      tag=""
      handle=".handle"
      v-model="list"
      v-bind="dragOptions"
      @start="drag = true"
      @end="sendOrders"
  >
    <transition-group type="transition" :name="!drag ? 'flip-list' : null">
      <div
          class="list-group-item"
          v-for="element in list"
          @dragend='sendOrders'
          :key="element.order"
      >
        <div v-if="movable">
          <div class="contact-button" :style="{color: element.color, backgroundColor: element.backgroundColor}">
            <div class="contact-logo">
              <img  style="width:30px; height:30px" class="contact-logo-img" :src="element.logo" alt="">
            </div>
            <div class="contact-text">{{ element.text }}</div>
            <img class="contact-logo-dots-down" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAABmJLR0QA/wD/AP+gvaeTAAAA9klEQVRoge3UMWoCQRiG4XfAwhwggoUhlU3IJTxvzuAhRIkEi2CZJl3A6kshA4usszvuojPwPeXu8vO/DDtgZmZmZmZmBhC6PpC0BF7usEvKMYTwlfpg0mPIL/ABvI+yUr49sBplkqRnSRvd36ek+SgRD4zJiuj8Ry5iZsAaeGt5/QeccuYBU+Cp5fkOWIUQfjLn9Zc4mW9JrxlzFpIOQ09ikKExRUQ0lrkppqiIxlJZMUVGNJbrFVN0RNQVU0VEJGkmaduy7OFKxFbn67w8iZMp/yQu9YgpPyJKxNQTEbXE1BcRNWLqjYh0vs3KvJ3MzMzMzKr0D+hLOItgCel7AAAAAElFTkSuQmCC"/>
            <img class="contact-logo-dots-up" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAABmJLR0QA/wD/AP+gvaeTAAABhklEQVR4nO3YMU7DUBBF0fcFBW2WgWjYTKQUKdgCJYtgFxFiQ6yDFolEjwJZGqQosuMZO8T31Pafka/cfAkAAAAAAAAAAAAAAAAAAAAAcJ1sb2xv5t4DkmyvbX/b3tvezr3PooUYHaLM5UgMoszlRAyiTK1HDKJMZUAMolQ7IwZRqoyIQZRsCTGIkiUxBlHG8u91yD4xRozCNcsQHv5nvNh+HhiFP6WPc2KEd4mSaUyMcAZRMmTECGcRZYzMGOFMopyjIkY4myhDVMYIM4jSxxQxwiyinDJljDCTKMfMESPMJko0Z4ywA1Gky4gRdll2lEuKEXa6yCiteoB/b1Z3km56vvIl6aNuoz8eJN31fPYgadtaey/cpzaI7bWkN0m3lXMmdJD01FrbVQ0oC3KFMTqlUUqCXHGMTlmU9CALiNEpiZIaZEExOulR0oIsMEYnNUpKkAXH6KRFGf0Bba8kPUp6HXvWP3dve9Va+5x7EQAAAAAAAAAAAAAAAAAAAAAAAAAAAIz0A70Ou4B844EEAAAAAElFTkSuQmCC">
            <div class="contact-logo-del" onclick="let result = confirm('Вы уверены?');if (result) $(this).siblings('form').submit()">
              <svg style="width:25px; height:25px; color: white" aria-hidden="true" focusable="false" data-prefix="fa-light" data-icon="trash-can" class="svg-inline--fa fa-trash-can fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M432 64h-96l-33.63-44.75C293.4 7.125 279.1 0 264 0h-80C168.9 0 154.6 7.125 145.6 19.25L112 64h-96C7.201 64 0 71.2 0 80c0 8.799 7.201 16 16 16h416c8.801 0 16-7.201 16-16C448 71.2 440.8 64 432 64zM152 64l19.25-25.62C174.3 34.38 179 32 184 32h80c5 0 9.75 2.375 12.75 6.375L296 64H152zM400 128C391.2 128 384 135.2 384 144v288c0 26.47-21.53 48-48 48h-224C85.53 480 64 458.5 64 432v-288C64 135.2 56.84 128 48 128S32 135.2 32 144v288C32 476.1 67.89 512 112 512h224c44.11 0 80-35.89 80-80v-288C416 135.2 408.8 128 400 128zM144 416V192c0-8.844-7.156-16-16-16S112 183.2 112 192v224c0 8.844 7.156 16 16 16S144 424.8 144 416zM240 416V192c0-8.844-7.156-16-16-16S208 183.2 208 192v224c0 8.844 7.156 16 16 16S240 424.8 240 416zM336 416V192c0-8.844-7.156-16-16-16S304 183.2 304 192v224c0 8.844 7.156 16 16 16S336 424.8 336 416z" fill="currentColor"/></svg>
            </div>
            <form method="POST" :action="getDeleteLink(element.profile_id, element.slug)">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" v-bind:value="csrf">
            </form>
            <a :href="'/edit-contact/' + element.profile_id + '/' + element.slug" class="contact-ref">
              <div class="contact-logo-edit">
                <svg aria-hidden="true" style="width:25px; height:25px; color: white" focusable="false" data-prefix="fa-light" data-icon="pen-to-square" class="svg-inline--fa fa-pen-to-square fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path d="M432 320c-8.836 0-16 7.164-16 16V448c0 17.67-14.33 32-32 32H64c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h112C184.8 96 192 88.84 192 80S184.8 64 176 64H63.1C28.65 64 0 92.65 0 128v320c0 35.35 28.65 64 63.1 64h319.1c35.35 0 63.1-28.65 63.1-64L448 336C448 327.2 440.8 320 432 320zM497.9 42.19l-28.13-28.14c-9.373-9.373-21.66-14.06-33.94-14.06s-24.57 4.688-33.94 14.06L162.4 253.6C153.5 262.5 147.4 273.9 144.9 286.3l-16.66 83.35c-1.516 7.584 4.378 14.36 11.72 14.36c.7852 0 1.586-.0764 2.399-.2385l83.35-16.67c12.39-2.479 23.77-8.566 32.7-17.5l239.5-239.5C516.7 91.33 516.7 60.94 497.9 42.19zM235.8 326.1c-4.48 4.48-10.13 7.506-16.35 8.748l-53.93 10.79L176.3 292.6c1.244-6.219 4.27-11.88 8.754-16.36l178.3-178.3l50.76 50.76L235.8 326.1zM475.3 87.45l-38.62 38.62l-50.76-50.76l38.62-38.62c4.076-4.076 8.838-4.686 11.31-4.686s7.236 .6094 11.31 4.686l28.13 28.14C479.4 68.9 480 73.66 480 76.14C480 78.61 479.4 83.37 475.3 87.45z" fill="currentColor"/>
                </svg>
              </div>
            </a>
            <div class="contact-button-move handle"></div>
          </div>
        </div>
        <div v-else>
          <a :href="element.echo_link" :style="{color: element.color, backgroundColor: element.backgroundColor}" class="contact-button">
            <div class="contact-logo">
              <img style="width:30px; height:30px" class="contact-logo-img" :src="element.logo" alt="">
            </div>
            <div class="contact-text">
              <div class="contact-text-top">{{ element.text }}</div>
            </div>
          </a>
        </div>
      </div>
    </transition-group>
  </draggable>
</template>

<script>
import draggable from "vuedraggable";

export default {
    name: "handle",
    display: "Handle",
    instruction: "Drag using the handle icon",
    order: 7,
    components: {draggable},
    props: ['movable', 'contacts'],
    data() {
        return {
            list: this.contacts.map((contact, index) => {
                // let echo_link = contact.main_link + contact.pivot.link;
                let echo_link = '';
                if(contact.main_link && contact.pivot.link) {
                    echo_link = contact.main_link + contact.pivot.link;
                } else {
                    if(contact.main_link) {
                        echo_link = contact.main_link;
                    }
                    if(contact.pivot.link) {
                        echo_link = contact.pivot.link;
                    }
                }

                 console.log(contact);

                let text = contact.pivot.text;
                if (!text) {text = contact.pivot.title;}
                if (!text) {text = contact.title;}
                return {
                    id: contact.id,
                    color: contact.pivot.color ? contact.pivot.color : contact.color,
                    logo: '/' + contact.logo,
                    type: contact.type,
                    title: contact.title,
                    backgroundColor: contact.pivot.background_color ? contact.pivot.background_color : contact.background_color,
                    main_link: contact.main_link,
                    main_text: contact.main_text,
                    link: contact.pivot.link,
                    text: text,
                    order: index + 1,
                    profile_id: contact.pivot.profile_id,
                    contact_id: contact.pivot.contact_id,
                    slug: contact.pivot.slug,
                    echo_link: echo_link,
                };
            }),
            drag: false,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },
    methods: {
        sendOrders() {
            if (this.movable) {
                axios.post('/contacts/' + this.list[0].profile_id, this.list)
                    .then(function (response) {
                        this.list = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },

        sort() {this.list = this.list.sort((a, b) => a.order - b.order);},
        getDeleteLink(profile_id, slug) {
            return '/edit-contact/' + profile_id + '/' + slug;
        }
    },
    computed: {
        dragOptions() {
            return {
                animation: 200,
                group: "description",
                disabled: !this.movable,
                ghostClass: "ghost"
            };
        }
    },
};
</script>
