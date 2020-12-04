/* eslint-disable no-unused-vars */

const Config = {
    wfsImgPath: "../../../img/",
    namedProjections: [
        ["EPSG:25831", "+proj=utm +zone=31 +ellps=GRS80 +towgs84=0,0,0,0,0,0,0 +units=m +no_defs"],
        ["EPSG:25832", "+proj=utm +zone=32 +ellps=GRS80 +towgs84=0,0,0,0,0,0,0 +units=m +no_defs"],
        ["EPSG:25833", "+proj=utm +zone=33 +ellps=WGS84 +towgs84=0,0,0,0,0,0,1 +units=m +no_defs"],
        // WGS84
        ["EPSG:4326", "+title=WGS 84 (long/lat) +proj=longlat +ellps=WGS84 +datum=WGS84 +no_defs"]
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
        showVersion: false
    },
    quickHelp: {
        imgPath: "../../../img/"
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