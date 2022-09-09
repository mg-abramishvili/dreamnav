<template>
    <div>
        <ckeditor :editor="editor" v-model="content" :config="editorConfig"></ckeditor>
    </div>
</template>

<script>
import CKEditor from '@ckeditor/ckeditor5-vue'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

export default {
    props: ['block'],
    data() {
        return {
            content: '',

            editor: ClassicEditor,
            editorConfig: {
                toolbar: [ 'bold', 'italic', '|', 'bulletedList', 'numberedList', '|', 'insertTable', '|', 'undo', 'redo' ],
            },
        };
    },
    created() {
        this.content = this.block.content
    },
    methods: {
        //
    },
    components: {
        ckeditor: CKEditor.component,
    }
}
</script>