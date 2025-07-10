<?php
if (extension_loaded('mongodb')) {
    echo "✅ Extension MongoDB disponible !";
} else {
    echo "❌ Extension MongoDB manquante !";
}