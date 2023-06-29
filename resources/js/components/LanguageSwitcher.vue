<template>
  <div class="language-switcher">
    <v-select
      class="custom-select"
      v-model="selectedLanguage"
      :items="supportedLanguages"
      item-text="text"
      item-value="value"
      :menu-props="{
        closeOnClick: true,
        closeOnContentClick: true,
      }"
      >
      <template v-slot:selection="{ item }">
        <div class="language-switcher__selection" @click="changeLanguage(item.value)">
          <country-flag :country="item.value" size="medium" />
        </div>
      </template>
      <template v-slot:item="{ item }">
        <v-list-item @click="changeLanguage(item.value)">
          <v-list-item-title>            <country-flag :country="item.value" size="medium" />
 {{ item.props.title.text }}</v-list-item-title>
        </v-list-item>
      </template>
    </v-select>
  </div>
</template>

<script>
import CountryFlag from 'vue-country-flag-next';

export default {
  name: 'LanguageSwitcher',
  data() {
    return {
      selectedLanguage: this.$i18n.locale,
      supportedLanguages: [
      { text: 'Русский', value: 'ru'.toString() },
      { text: 'Українська', value: 'ua'.toString() },
      { text: 'English', value: 'us'.toString() },
    ]
    };
  },
  components: {
    CountryFlag,
  },
  methods: {
    changeLanguage(value) {
      this.$i18n.locale = value;
      this.selectedLanguage = value;
    },
  },
};
</script>

<style scoped>
.language-switcher {
  display: flex;
  align-items: center;
  gap: 10px; /* Расстояние между элементами */
}

.language-switcher__selection {
  display: flex;
  align-items: center;
  cursor: pointer;
}

.language-switcher__selection .country-flag {
  margin-right: 5px; /* Расстояние между флагом и текстом */
}

.language-item {
  cursor: pointer;
}

.language-switcher :deep() .v-input__control {
  grid-area: none !important;;
}


.language-item:hover {
  background-color: #e0e0e0;
}


.language-switcher .v-select__selections {
  height: auto;
  min-height: 30px;
  padding: 4px 8px;
  font-size: 14px;
}

.language-switcher .v-select__selections .v-input__slot {
  align-items: center;
}

.language-switcher .v-list-item__content {
  font-size: 14px;
}

.language-switcher .v-list-item__avatar {
  min-width: 24px;
  min-height: 24px;
}

.language-switcher .v-list-item__title {
  margin-left: 8px;
}

.custom-select :deep() .v-select__selections {
  height: 32px; /* Устанавливаем желаемую высоту */
}

.custom-select :deep() .v-select__selection {
  line-height: 32px; /* Устанавливаем желаемую высоту текста */
  padding: 0 10px; /* Устанавливаем внутренние отступы */
  flex-shrink: 0 !important;
}


.custom-select :deep() .v-select__selection--comma {
  margin-right: 0; /* Удаляем отступ справа от выбранного элемента */
}

.custom-select :deep() .v-select__selection-indicator {
  top: 10px; /* Сдвигаем индикатор выбора немного вверх */
}
</style>
