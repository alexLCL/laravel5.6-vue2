var api_url='';
var app_url='';
var baidu_map_js_api_key='bCcG2SWs9UauzYUVsrf7TDN53BYPXGP1';

switch (process.env.NODE_ENV) {
    case 'development':
        api_url='http://localhost:8000/api/v1';
        app_url='http://localhost:8000';
        break;

    case 'production':
        api_url='http://localhost:8000/api/v1';
        app_url='http://localhost:8000';
        break;
}

export const ROAST_CONFIG={
    API_URL:api_url,
    APP_URL:app_url,
    BAIDU_MAPS_JS_API_KEY:baidu_map_js_api_key
}