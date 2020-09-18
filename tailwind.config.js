const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                gray: {
                    ...defaultTheme.colors.gray,
                    'custom-100': '#FBF7FF',
                    'custom-200': '#6C5CE712',
                    'custom-300': '#00000012',
                    'custom-400': '#CFCFCF',
                },
                indigo: {
                    ...defaultTheme.colors.indigo,
                    'custom-300': '#6C5CE7'
                },
                green: {
                    ...defaultTheme.colors.green,
                    'custom-25': '#E1EAE4',
                    'custom-50': '#EFECE4',
                    'custom-100': '#E1F1F2',
                    'custom-200': '#05C788',
                    'custom-600': '#057C00',
                    'custom-900': '#8B9007'
                },
                blue: {
                    ...defaultTheme.colors.blue,
                    'custom-50': '#E8ECFF',
                    'custom-500': '#4D94FF'
                },
                orange: {
                    ...defaultTheme.colors.orange,
                    'custom-50': '#F9EEE4',
                    'custom-400': '#F1A902'
                },
                purple: {
                    ...defaultTheme.colors.purple,
                    'custom-50': '#F6E0FF',
                    'custom-500': '#CC1EFF'
                },
                pink: {
                    ...defaultTheme.colors.pink,
                    'custom-400': '#FF3B7B'
                },
                brown: {
                    'custom-50': '#EEE4E4',
                    'custom-500': '#854607'
                },
                yellow: {
                    ...defaultTheme.colors.yellow,
                    'custom-300': '#FCEF48'
                },
                red: {
                    ...defaultTheme.colors.red,
                    'custom-50': '#FBE3F1',
                    'custom-500': '#FF0000'
                },
                black: {
                    'default': defaultTheme.colors.black,
                    'another': '#252525'
                },
                'hot-pink': '#fd2d78',
            },
            rotate: {
                ...defaultTheme.rotate,
                '-10': '-10deg',
                '-9': '-9deg',
                '-8': '-8deg',
                '-7': '-7deg',
                '-6': '-6deg',
                '-5': '-5deg',
                '-4': '-4deg',
                '-3': '-3deg',
                '-2': '-2deg',
                '-1': '-1deg',
                '1': '1deg',
                '2': '2deg',
                '3': '3deg',
                '4': '4deg',
                '5': '5deg',
                '6': '6deg',
                '7': '7deg',
                '8': '8deg',
                '9': '9deg',
                '10': '10deg',
            },
            spacing: {
                ...defaultTheme.spacing,
                '7': '1.75rem',
                '9': '2.25rem',
                '14': '3.5rem',
                '22': '5.5rem',
                '26': '6.5rem',
                '28': '7rem',
                '30': '7.5rem',
                '34': '8.5rem',
                '36': '9rem',
                '38': '9.5rem',
                '44': '11rem',
                '52': '13rem',
                '60': '15rem',
                '68': '17rem',
                '72': '18rem',
                '76': '19rem',
                '80': '20rem',
                '88': '22rem',
                '96': '24rem',
                '104': '26rem',
                '110': '28rem',
                '118': '30rem',
                '126': '32rem',
                '132': '34rem',
                '140': '36rem',
            }
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
