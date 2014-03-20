<?php

namespace Saxulum\ClassFinder;

class ClassFinder
{
    public static function findClasses($phpCode)
    {
        $tokens = token_get_all($phpCode);
        $tokenCount = count($tokens);
        $namespaceStack = array();
        $braces = array();
        $classes = array();

        for ($i = 0; $i < $tokenCount; $i++) {

            if (is_array($tokens[$i]) && in_array($tokens[$i][0], array(T_NAMESPACE, T_CLASS))) {
                $type = $tokens[$i][0]; $i++; $namespace = '';
                while ($tokens[$i++] && in_array($tokens[$i][0], array(T_NS_SEPARATOR, T_STRING))) {
                    $namespace .= $tokens[$i][1];
                }
                $namespaceStack[] = $namespace;
                $braces[$namespace] = 0;
                if ($type === T_CLASS) {
                    $classes[] = implode('\\', $namespaceStack);
                }
            }

            if (is_string($tokens[$i]) && $tokens[$i] === '{') {
                $lastNamespace = end($namespaceStack);
                if ($lastNamespace) {
                    $braces[$lastNamespace]++;
                }
            }

            if (is_string($tokens[$i]) && $tokens[$i] === '}') {
                $lastNamespace = end($namespaceStack);
                if ($lastNamespace) {
                    $braces[$lastNamespace]--;
                    if ($braces[$lastNamespace] === 0) {
                        array_pop($namespaceStack);
                    }
                }
            }
        }

        return $classes;
    }
}
