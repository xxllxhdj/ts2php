/**
 * @file Object
 * @author cxtom(cxtom2008@gmail.com)
 */

import {
    EmitHint,
    isPropertyAccessExpression,
    isIdentifier,
    isCallExpression,
} from 'typescript';

import {
    isNumberLike
} from '../utilities/nodeTest';

import method from '../utilities/method';

const staticMap = {
    isInteger: method('is_int', false)
};

const protoMap = {
    toFixed: method('number_format', true, 1)
};

export default {

    emit(hint, node, {helpers, typeChecker, helperNamespace}) {

        const expNode = node.expression;
        let func;

        if (
            hint === EmitHint.Expression
            && isCallExpression(node)
            && isPropertyAccessExpression(expNode)
        ) {

            if (
                isIdentifier(expNode.expression)
                && expNode.expression.escapedText === 'Number'
                && (func = staticMap[helpers.getTextOfNode(expNode.name)])
            ) {
                return func(node, helpers, {helperNamespace});
            }

            if (
                isNumberLike(expNode.expression, typeChecker)
                && (func = protoMap[helpers.getTextOfNode(expNode.name)])
            ) {
                return func(node, helpers, {helperNamespace});
            }
        }

        return false;
    }
};
