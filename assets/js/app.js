import "../scss/global.scss";
import { createApp } from 'vue';
import App from './pages/App';

require('bootstrap');
const delimiters = ["[[", "]]"];

const AppMain = createApp({
    delimiters,
    components: {
	App
    }
});

AppMain.mount("#app");
