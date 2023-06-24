// app.js

import { createApp } from 'vue';
import { createI18n } from 'vue-i18n';
import vuetify from './vuetify';
import 'vuetify/styles';


import messages from './locales/messages.js';
import PaymentForm from './components/PaymentForm.vue';

const i18n = createI18n({
    legacy: false,
    locale: 'ru', // Установите начальный язык по умолчанию
    fallbackLocale: 'en', // Язык, используемый при отсутствии перевода для выбранного ключа
    messages,
  });

createApp(PaymentForm).use(i18n).use(vuetify).mount('#app');



