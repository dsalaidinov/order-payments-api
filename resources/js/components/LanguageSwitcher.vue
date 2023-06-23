<template>
    <div class="language-switcher">
      <select v-model="selectedLanguage" @change="changeLanguage">
        <option v-for="language in supportedLanguages" :value="language" :key="language">{{ language }}</option>
      </select>
    </div>
  </template>
  
  <script>
  export default {
    name: 'LanguageSwitcher',
    data() {
      return {
        selectedLanguage: '',
        supportedLanguages: ['RU', 'UA', 'EN'],
      };
    },
    methods: {
      // changeLocale(locale) {
      //   this.$store.dispatch('setLocale', locale);
      //   this.$locale = locale;
      // },
      changeLanguage() {
        console.log('selectedLanguage', this.selectedLanguage)
        // Обработка выбранного языка и обновление $locale
        this.$i18n.locale = this.selectedLanguage;
      }
    },
  };
  </script>
  
  <style scoped>
  /* .language-switcher {
  } */
  </style>
  