import DetailField from "./components/DetailField";
import FormField from "./components/FormField";
import IndexField from "./components/IndexField";
import Vue3TouchEvents from "vue3-touch-events";
import V3ScrollLock from 'v3-scroll-lock';

Nova.booting((app, store) => {
    app.use(Vue3TouchEvents);
    app.use(V3ScrollLock);
    app.component("index-image-gallery-field", IndexField);
    app.component("detail-image-gallery-field", DetailField);
    app.component("form-image-gallery-field", FormField);
});
