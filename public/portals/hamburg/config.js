/* eslint-disable no-unused-vars */

const Config = {
    wfsImgPath: "../../img/",
    namedProjections: [
        ["EPSG:25832", "+title=ETRS89/UTM 32N +proj=utm +zone=32 +ellps=GRS80 +towgs84=0,0,0,0,0,0,0 +units=m +no_defs"]
    ],
    footer: {
        urls: [
            {
                "bezeichnung": "Kartographie und Gestaltung: ",
                "url": "https://www.geoinfo.hamburg.de/",
                "alias": "Landesbetrieb Geoinformation und Vermessung",
                "alias_mobil": "LGV"
            }
        ],
        showVersion: true
    },
    quickHelp: {
        imgPath: "../../img/"
    },
    portalLanguage: {
        enabled: true,
        debug: false,
        languages: {
            de: "deutsch",
            en: "englisch"
        },
        fallbackLanguage: "de",
        changeLanguageOnStartWhen: ["querystring", "localStorage", "navigator", "htmlTag"],
        loadPath: "../../mastercode/locales/{{lng}}/{{ns}}.json"
    },
    layerConf: "../../../config/services-internet.json", 
    restConf: "../../../config/rest-services-internet.json",
    styleConf: "../../../config/style_v3.json",
    scaleLine: true,
    mouseHover: {
        numFeaturesToShow: 2,
        infoText: "(weitere Objekte. Bitte zoomen.)"
    },
    useVectorStyleBeta: true
};

/* eslint-enable no-unused-vars */