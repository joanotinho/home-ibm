require('../bootstrap');

import { savedChangesStatus } from './scripts/savedChangesStatus.js';
import { events } from './scripts/events.js';
import { tabs } from './scripts/tabs.js';
import {filter} from "./scripts/filter.js";
import {ckeditor} from "./scripts/ckeditor.js";
import {plusMinusButton} from "./scripts/plusMinusButton.js";

savedChangesStatus();
events();
tabs();
filter();
ckeditor();
plusMinusButton();