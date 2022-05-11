require('../bootstrap');

import { savedChangesStatus } from './scripts/savedChangesStatus.js';
import { events } from './scripts/events.js';
import { tabs } from './scripts/tabs.js';
import { menuButton } from './scripts/menuButton.js';
import {filter} from "./scripts/filter.js";
import {ckeditor} from "./scripts/ckeditor.js";
import {plusMinusButton} from "./scripts/plusMinusButton.js";
import {faqs} from "./scripts/faqs.js";

savedChangesStatus();
events();
tabs();
menuButton();
filter();
ckeditor();
plusMinusButton();
faqs();