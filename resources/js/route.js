import { route } from 'ziggy';
import { Ziggy } from './ziggy';

// Override Ziggy URL with current domain if not set
if (typeof window !== 'undefined' && (!Ziggy.url || Ziggy.url === '')) {
    Ziggy.url = window.location.origin;
}

window.route = function(name, params=undefined){
    return route(name, params, undefined, Ziggy);
};