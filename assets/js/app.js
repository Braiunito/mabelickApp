import "../scss/global.scss";
import { createApp } from 'vue';
import App from './views/App';
import router from './router';

require('bootstrap');
const delimiters = ["[[", "]]"];

const AppMain = createApp({
    delimiters,
    components: {
	    App
    }
});

AppMain.use(router);
AppMain.mount("#app");
