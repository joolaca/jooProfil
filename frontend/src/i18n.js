import i18n from 'i18next';
import { initReactI18next } from 'react-i18next';
import Backend from 'i18next-http-backend';
import LanguageDetector from 'i18next-browser-languagedetector';

import translationEN from './language/en/translation.json';
import translationHU from './language/hu/translation.json';

i18n
    .use(initReactI18next)
    .use(Backend)
    .use(LanguageDetector)
    .use(initReactI18next)
    .init({
        debug: true,
        fallbackLng: 'en',
        interpolation: {
            escapeValue: false,
        },
        resources: {
            en: {
                translation: translationEN
            },
            hu: {
                translation: translationHU
            },
        }
    });

export default i18n;