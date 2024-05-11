<template>
    <PanelItem :index="index" :field="field">
        <template #value>
            <div
                class="image-gallery-field"
                v-if="field.value && field.value.length"
            >
                {{ current }}
                <light-box :index="selected" :images="images" />
                <div class="grid content-start gap-1 grid-cols-2 md:grid-cols-4 lg:grid-cols-6 xl:grid-cols-8 2xl:grid-cols-10">
                    <FieldImage
                        v-for="(image, index) in images"
                        :image="image"
                        :key="image.id"
                        readonly
                        @click="select(index)"
                    />
                </div>
            </div>
            <div class="image-gallery-field" v-else>-</div>
        </template>
    </PanelItem>
</template>

<script>
import FieldImage from "./FieldImage.vue";
import LightBox from "./LightBox.vue";

export default {
    props: ["index", "resource", "resourceName", "resourceId", "field"],
    components: {
        FieldImage,
        LightBox,
    },
    data() {
        return {
            selected: null,
        };
    },
    computed: {
        images() {
            return Array.from(this.field.value);
        },
    },
    methods: {
        select(index) {
            this.selected = index;
        },
    },
};
</script>
