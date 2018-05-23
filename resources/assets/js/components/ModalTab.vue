<script>
    export default {
        methods: {
            close() {
                this.$emit('close');
            }
        },
    };
</script>

<template>
    <div class="modal fade show" 
        style="display: block;background-color: rgba(0, 0, 0, .5; transition: opacity .3s ease;" 
        id="exampleTabs" aria-hidden="true" aria-labelledby="exampleModalTabs"
        role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" 
                        class="close" @click="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalTabs">
                        <slot name="title"></slot>
                    </h4>
                </div>

                <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-toggle="tab" href="#home"
                        aria-controls="home" role="tab">Home</a>
                    </li>
                    <slot name="menu"></slot>
                </ul>

                <div class="modal-body">
                    <slot name="content"></slot>
                </div>
            </div>
        </div>
    </div>
</template>